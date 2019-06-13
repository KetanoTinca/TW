<?php include  "../classes/Database.php"; ?>
<!DOCTYPE html>
<html lang= "en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | View Students </title>
    <link rel="stylesheet" href="../CSS/style_view_studs.css?version=4">
</head>
<body>
<header>
    <?php include 'navbar.php';?>
</header>


<?php include 'user.description.php';?>

<section id="student_list">
    <div id="head">
        <h1>Thesis Requests</h1>
        <p>Choose or decline students that want to work on your proposed thesis!</p>
    </div>
    <table id="requested">
        <tr>
            <th>Student</th>
            <th>Thesis' Subject</th>
            <th>Grade</th>
            <th>Email</th>
            <th>Year</th>
            <th>Accept</th>
            <th>Decline</th>
        </tr>
        <?php include_once "../classes/ConfirmRequest.php";
        include_once "../classes/Database.php";

        if (isset($_SESSION['teacher_id'])) {
            $request = new ConfirmRequest(NULL,$_SESSION['teacher_id']);
            echo $request->getRequest($_SESSION['teacher_id']);
            if(isset($_GET['accept'])&& !(empty($_GET['accept']))){
                $request->acceptRequest($_GET['accept']);
            }
            else if (isset($_GET['decline']) && !(empty($_GET['decline']))){
                $request->declineRequest($_GET['decline']);
            }
        }

        ?>
    </table>
</section>
<footer>
    <p>AcaTisM App, Copyright &copy; 2019</p>
</footer>
</body>
</html>