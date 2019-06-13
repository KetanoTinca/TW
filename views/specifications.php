<?php include  "../classes/Database.php"; ?>
<?php
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

function getThesisInfo($studentId) {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT theme.themeName as themeName, concat(user.firstName, user.lastName) as name, theme.description as description, theme.academicYear as year FROM board 
            JOIN theme on board.theme_fk=theme.id JOIN teacher on teacher.id=theme.teacher_fk JOIN user on user.teacher_fk=teacher.id where board.student_fk=:studentId;";

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
<html lang= "en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | View Students </title>
    <link rel="stylesheet" href="../CSS/style_profile.css?version=4">
</head>
<body>
<header>
    <?php include 'navbar.php';?>
</header>


<?php include 'user.description.php';?>

<section id="student_list">
    <div id="head">
        <div class="container" style="background-color: white; padding: 10px; width: 60%;">
            <div class="text" >
                <h1>Specifications:</h1>
            </div>
                <?php
                echo "<div>" . getThesisInfo($_SESSION['studentId']). "</div>";
                ?>


            <p>Posted at:</p>
        </div>

    </div>

    </table>
</section>
<footer>
    <p>AcaTisM App, Copyright &copy; 2019</p>
</footer>
</body>
</html>