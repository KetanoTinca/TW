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
                user.email as email, student.studyYear as syear FROM user JOIN student on student.user_fk=user.id 
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
                        <th><button class=\"small_button\">Accept</button></th>
                        <th><button class=\"decline_button\">Decline</button></th>
                        </tr>";

            }
        }
    }

    public function acceptRequest($teacherId, $studentId, $themeId){

        $sql="INSERT INTO board(student_fk, theme_fk) VALUES (:student_fk, :theme_fk);";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":student_fk", $studentId, PDO::PARAM_STR);
            $stmt->bindParam(":theme_fk", $themeId, PDO::PARAM_STR);
            $stmt->execute();
        }

        $sql="DELETE FROM request WHERE student_fk=:studentId;";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":student_fk", $studentId, PDO::PARAM_STR);
            $stmt->execute();
        }

    }
}