<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | View Teachers! </title>
    <link rel="stylesheet" href="../CSS/style_view_profs.css?version=8">
    <link rel="stylesheet" href="../CSS/tooltipandmodal.css">
    <script src="../javascript/modal.js"></script>
</head>

<body>

    <div id="surface">

        <?php
        function redirect($url, $statusCode = 303)
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }


        include '../classes/Database.php';
        include '../controller/session.php';
        include 'navbar.php';
        if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'student') {

            include 'choose_prof.php';
            if( isset($_GET['cancel'])&& $_GET['cancel']=='true'){

                deleteRequests($_SESSION['student_id']);

            }

        } else { }


        ?>




        <footer>
            <p>AcaTisM App, Copyright &copy; 2019</p>
        </footer>
    </div>
</body>

</html>