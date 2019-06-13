<?php include "../controller/session.php"; ?>

<?php


function getProfs()
{

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql = "SELECT concat(concat(user.firstName, ' '), user.lastName) as name, theme.themeName as tname, 
        theme.id, teacher.id,theme.description FROM theme join teacher on theme.teacher_fk=teacher.id join user on teacher.user_fk=user.id WHERE NOT EXISTS(SELECT * FROM request WHERE theme_fk = theme.id AND student_Fk = :studentId)";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':studentId', $_SESSION['student_id'], PDO::PARAM_INT);
        $stmt->execute();
        $j=0;
        while ($row = $stmt->fetch()) {
            $j=$j+1;
            echo "<tr>
    <th><button class ='modalB' onclick='showModal($j)'>" . $row[0] . "</button></th>
    <th><div class='tooltip'>" . $row[1] . "<span class='tooltiptext'>$row[4]</span></div></th>
    <th><button class=\"small_button\"
                onclick=\"location.href='./application-form.php?id=" . $row[2] . "'\">Apply</button>
    </th>
</tr>
";

            $sql2="SELECT * FROM theme WHERE teacher_fk = :teacher_id";
            try{
                $stmt2= $db->prepare($sql2);
                $stmt2->bindParam(':teacher_id', $row[3], PDO::PARAM_INT);
                $stmt2->execute();
                echo "<div id=\"myModal$j\" class=\"modal\">

                <!-- Modal content -->
                <div class=\"modal-content\">
                    <span class=\"close\">&times;</span>";
                echo "<center><h1 style='padding: 0;margin: 0;'>All $row[0]'s themes</h1></center>
             <hr style='width:60%;padding: 0;'>";
                $i=0;
                while($row2=$stmt2->fetch()){
                    $i=$i+1;
                    //  echo "<center><p>$i" . $row2[2] . " " . $row2[3] . "<a>Apply</a></p></center>";
                    echo "<div style='width:90%;margin-left: auto;margin-right: auto; display: grid;grid-template-columns: auto auto auto auto;margin-top: 15px;'>";
                    echo "<div style='padding: 20px;  font-size: 30px;  text-align: center;'>$i.</div>";
                    $a1= htmlentities($row2[2], ENT_QUOTES);
                    echo "<div style='padding: 20px;  font-size: 30px;  text-align: center;'>$a1</div>";
                    $a2= htmlentities($row2[3], ENT_QUOTES);
                    echo "<div style='padding: 20px;  font-size: 30px;  text-align: center;height:150px;overflow: auto; '>$a2</div>";
                    echo "<div style='padding: 20px;  font-size: 30px;  text-align: center;'><button class=\"small_button\"
                onclick=\"location.href='./application-form.php?id=" . $row[2] . "'\">Apply</button></div>";
                    echo "</div>";
                }
                echo "</div>

            </div>";

            }catch(PDOException $e){
                echo  $e->getMessage();
            }



        }

    } catch (PDOException $e) {
        echo $e->getMessage();

    }
}

function getGrade($studentId)
{

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql = "SELECT averageGrade FROM student where id=:studentId";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }

    return null;
}

function deleteRequests($studentId)
{
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    try {
        $sql = "DELETE FROM request WHERE student_fk=:studentId;";
        if ($stmt = $db->prepare($sql)) {
            $stmt->bindParam(":studentId", $studentId, PDO::PARAM_INT);
            $stmt->execute();

            return TRUE;
        }
        else{
            return FALSE;
        }
    } catch(PDOException $e) {
        return $e->getMessage();
    }

    return FALSE;

}
?>

<section id="teacher_list">
    <div>
        <?php
        if (isset($_SESSION['userType'])) {

            echo "<h1 id='logged_message'> Hello " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " please choose your teacher and wait to be accepted.</h1>";
        }
        //            if(isset($_SESSION['board']) && $_SESSION['board'] == 0){
        //            $sql2 = "SELECT board_fk
        //            	    FROM student
        //                	WHERE id=:student_id
        //
        //                       LIMIT 1";
        //            $stmt2 = $db->prepare($sql2);
        //            $stmt2->bindParam(':student_id',$_SESSION['student_id'], PDO::PARAM_STR);
        //            $stmt2->execute();
        //            if ($stmt2->rowCount() == 1) {
        //                $result2 = $stmt2->fetch();
        //
        //               // $_SESSION['student_id'] = $result2[0];
        //                if($_SESSION['board']!=$result2[0]){
        //                    $_SESSION['board'] = $result2[0];
        //                }
        //
        //            }
        //            }
        //            if($_SESSION['board'] !=0){
        //                Redirect('../views/user.php', false);
        //
        //            }
        //
        //        }

        ?>
        <div id="description">
            <h1>Pick the teacher that best suits your purpose!</h1>
            <p>Here you have the name of the teacher, along with the subjects they cover in their work. If you like
                what
                you see, you can sign-up and complete the form, to check if you fit the description of their ideal
                student.</p>
        </div>
        <table id="teachers">
            <tr>
                <th>Teachers</th>
                <th>Subjects</th>
                <th></th>
            </tr>
            <?php
            getProfs();
            ?>
        </table>
        <div class="button_wrapper">
            <form action="view-profs.php" method="get">

            <button class="small_button" id="cancel_button" value="true" name="cancel" type="submit">Cancel your current thesis request</button>

            </form>

            <div>
</section>