<?php include  "../controller/session.php"; ?>

<?php



function getProfs(){

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT concat(concat(user.firstName, ' '), user.lastName) as name, theme.themeName as tname, theme.id FROM theme join teacher on theme.teacher_fk=teacher.id join user on teacher.user_fk=user.id";

    try{
        $stmt = $db->prepare($sql);
        $stmt->execute();

        while($row = $stmt->fetch())
        {
            echo "<tr>
    <th>". $row[0]. "</th>
    <th>". $row[1]. "</th>
    <th><button class=\"small_button\"
                onclick=\"location.href='./application-form.php?id=" . $row[2] . "'\">Apply</button>
    </th>
</tr>
";

        }

    } catch (PDOException $e) {
        echo $e->getMessage();

    }
}

function getGrade($studentId){

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT averageGrade FROM student where id=:studentId";

    try{
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

?>

<section id="teacher_list">
    <div>
        <?php
        if(isset($_SESSION['userType'])){

            echo "<h1 id='logged_message'> Hello " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " please choose your teacher and wait to be accepted.</h1>";}
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
            <button class="small_button" id="cancel_button">Cancel your current thesis request</button>
            <div>
</section>