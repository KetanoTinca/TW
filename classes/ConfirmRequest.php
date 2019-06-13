<?php


class ConfirmRequest
{
    private $_db;
    private $teacher_Fk;
    public function __construct($db = NULL, $teacher_Fk)
    {
        if (is_object($db)) {
            $this->_db = $db;
        } else {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        }

        $this->$teacher_Fk=$teacher_Fk;
    }

    public function getRequest($teacherId)
    {
        $sql = "SELECT concat(user.firstname,user.lastname) as name, theme.themeName as themename,  student.averageGrade as grade, 
                user.email as email, student.studyYear as syear, request.id as requestId FROM user JOIN student on student.user_fk=user.id 
                JOIN request on student.id=request.student_fk
                JOIN theme on theme.id=request.theme_fk
                JOIN teacher on teacher.id=theme.teacher_fk
                WHERE teacher.id=:teacherId;";


        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":teacherId", $teacherId, PDO::PARAM_STR);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<form action=\"./requests.php\" method=\"get\">";
                echo "<tr>
                        <th>" . $row['name'] . "</th>
                        <th><p>" . $row['themename'] . "</p></th>
                        <th>" . $row['grade'] . "</th>
                        <th>" . $row['email'] . "</th>
                        <th>" . $row['syear'] . "</th>
                        <th><button type='submit' name='accept' value=". $row['requestId'] . " class=\"small_button\">Accept</button></th>
                        <th><button type='submit' name='decline' value=". $row['requestId'] . " class=\"decline_button\">Decline</button></th>
                        </tr>";

            }
        }
    }

    public function acceptRequest($requestId){
        $sql2 =" SELECT student_fk, theme_fk FROM request WHERE id =:requestId";
        if ($stmt = $this->_db->prepare($sql2)) {
            $stmt->bindParam(":requestId", $requestId, PDO::PARAM_INT);
            $stmt->execute();
            $row= $stmt->fetch();
            $studentId = $row[0];
            $themeId = $row[1];
        }
        $sql="INSERT INTO board(student_fk, theme_fk) VALUES (:student_fk, :theme_fk);";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":student_fk", $studentId, PDO::PARAM_INT);
            $stmt->bindParam(":theme_fk", $themeId, PDO::PARAM_INT);
            $stmt->execute();
        }
        $sql="Select id from board where student_fk=:studentId;";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":studentId", $studentId, PDO::PARAM_INT);
            $stmt->execute();
            $row=$stmt->fetch();
            $boardId=$row[0];
        }

        $sql="UPDATE student SET board_fk=:boardId WHERE id=:studentId;";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":boardId", $boardId, PDO::PARAM_INT);
            $stmt->bindParam(":studentId", $studentId, PDO::PARAM_INT);
            $stmt->execute();
        }

        $sql="DELETE FROM request WHERE student_fk=:studentId;";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":studentId", $studentId, PDO::PARAM_INT);
            $stmt->execute();
        }

    }

    public function declineRequest($requestId){

        $sql="DELETE FROM request WHERE id=:requestId;";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":requestId", $requestId, PDO::PARAM_INT);
            $stmt->execute();
        }

    }

    private function getPercent($boardFk){
        $all = 0;
        $done = 0;
        $sql = 'select count(*) from task where board_fk=:boardId';
        $sql2= 'select count(*) from task where board_fk=:boardId and status=3';

        if($stmt = $this->_db->prepare($sql)){
            $stmt->bindParam(":boardId", $boardFK, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch();
            $all = $row[0];
        }
        if($stmt = $this->_db->prepare($sql2)){
            $stmt->bindParam(":boardId", $boardFK, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch();
            $done = $row[0];
        }
        if($all == 0){
        $percent = 0;
        }else{
        $percent = round(($done * 100 / $all),2);
        }
        return "<th>" . $percent . "% </th>";
}    

    public function getStudents($teacherId)
    {
        $sql = "select concat(Concat(u.firstName,' '),u.lastName), th.themeName,b.id  
        from user u inner join student s on s.user_fk=u.id inner join board b on s.board_fk=b.id inner 
        join theme th on th.id=b.theme_fk inner join teacher t on t.id=th.teacher_fk where t.id=:teacherId";
    
        if ($stmt = $this->_db->prepare($sql)) {
            
            $stmt->bindParam(":teacherId", $teacherId, PDO::PARAM_STR);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                
                echo "<form action=\"./progress.php\" method=\"get\">";
                echo "<tr>
                        <th>" . $row[0] . "</th>
                        <th><p>" . $row[1] . "</p></th>"
                        . $this->getPercent($row[2]). "
                        
                        <th><button type='submit' name='board' value=". $row[2] . " class=\"small_button\">Board</button></th>
                        
                        </tr>
                        </form>";

            }
        }
    }
}