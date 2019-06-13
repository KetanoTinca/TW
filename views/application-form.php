<?php include  "../classes/Database.php"; ?>
<?php include  "../controller/session.php"; ?>

<?php

function getYear($studentId){

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT studyYear FROM student where id=:studentId";

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

function getThesisName($themeId){

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT themeName FROM theme where id=:themeId";

    try{
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':themeId', $themeId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }

    return null;

}

function getThesisDescription($themeId){

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT description FROM theme where id=:themeId";

    try{
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':themeId', $themeId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }

    return null;

}

function getTeacherName($themeId){
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT concat(concat(user.firstName, ' '), user.lastName) as name FROM theme join teacher on theme.teacher_fk=teacher.id join user on teacher.user_fk=user.id where theme.id=:themeId";
    try{
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':themeId', $themeId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }

    return null;
}

function getThesisYear($themeId){
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT academicYear from theme where id=:themeId";
    try{
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':themeId', $themeId, PDO::PARAM_INT);
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
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | Profile </title>
    <link rel="stylesheet" href="../CSS/application_form.css?version=3">
</head>

<body>


<div class="navbar">
    <a href="./view-profs.php">Homepage</a>
    <a href="./view-profs.php">AcaTisM</a>
    <a href='../classes/Database.php?action=logout'">Log Out</a>
</div>

<div class="header" >
    <div id="image-header">
        <?php
        echo "<h1>" . getThesisName($_GET['id']). "</h1>";
        ?>
    <p>Read about the Thesis' Theme and Apply.</p>
    </div>
</div>


<?php
if(isset($_GET['action']) && $_GET['action'] == 'added'){
    echo "<h4 style='color: green;'><center>You successfully applied!</center></h4>";
}else{
    if(isset($_GET['action']) && $_GET['action']=='wrong'){
        echo "<h4 style='color: red;'><center>Something was wrong!</center></h4>";
    }
}
?>

<div class="row">
    <div class="side">
        <form action="../controller/applyRequest.php" method="post">
            <input type="hidden" name="themeId" value=<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>>
        <h2>Apply</h2>
        <h5>Press the button, or go back to apply for another subject.</h5>
        <?php
        echo "<p> Student: <strong>" . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "</strong></p>";
        ?>
        <?php
        echo "<p> Year: <strong>" . getYear($_SESSION['student_id']). "</strong></p>";
        ?>
        <?php
        echo "<p> Grade: <strong>" . getGrade($_SESSION['student_id']). "</strong></p>";
        ?>
        <div class="button_wrapper">
            <button class="small_button" id="cancel_button" type="submit" <?php echo isset($_GET['action']) && $_GET['action'] == "added" ? "disabled" : "";?>>Apply</button>
        </div>
        </form>
    </div>
    <div class="main">
        <h2>Specifications</h2>
        <?php
        echo "<p>" . getThesisDescription($_GET['id']) . "</p>";
        ?>

        <h3>Proposed by:</h3>
        <?php
        echo "<p>" . getTeacherName($_GET['id']) . "</p>";
        ?>
        <h3>Academic Year</h3>
        <?php
        echo "<p>" . getThesisYear($_GET['id']) . "</p>";
        ?>
    </div>
    <div class="footer">
        <p>AcaTisM App, Copyright &copy; 2019</p>
    </div>
</div>


</body>
</html>