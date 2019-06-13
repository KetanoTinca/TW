<?php include  "../classes/Database.php"; ?>
<?php
function getThesisInfo($studentId) {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $sql="SELECT t.themeName as themeName, concat(u.firstName, u.lastName) as name, t.description as description, t.academicYear as year from theme t inner join teacher th on th.id=t.teacher_fk inner join board b on b.theme_fk =t.id inner join user u on u.id = th.user_fk where b.student_fk=:studentId";

    try{
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        
        echo "<h3>$result[0]</h3>
        
              <p><strong>Teacher</strong>: $result[1]</p>
              <p><strong>Description</strong>: $result[2]</p>
              <p><strong>Academic Year</strong>:$result[3]</p>";
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
                echo "<div>" . getThesisInfo($_SESSION['student_id']). "</div>";
                ?>
        </div>

    </div>

    </table>
</section>
<footer>
    <p>AcaTisM App, Copyright &copy; 2019</p>
</footer>
</body>
</html>