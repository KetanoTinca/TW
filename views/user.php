<!DOCTYPE html>
<?php include  "../classes/Database.php"; ?>
<?php include  "../controller/session.php"; ?>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
        <meta name="keywords" content="web application, faculty, thesis, licence, education">
        <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
        <title>AcaTisM | Profile </title>
        <link rel="stylesheet" href="../CSS/style_profile.css">
        <script>
            function myFunction() {
              var dots = document.getElementById("dots");
              var moreText = document.getElementById("hidden-list");
              var btnText = document.getElementById("show-more");
            
              if (dots.style.display === "none") {
                dots.style.display = "inline";
                
                moreText.style.display = "none";
              } else {
                dots.style.display = "none";
                
                moreText.style.display = "block";
              }
            }
        </script>

        
    </head>
    <body>

    <?php include 'navbar.php';?>

    <?php include 'user.description.php';

    if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'teacher')
    {
        include 'newsfeedProf.php';
    }else{
        include 'newsfeedStudent.php';
    }

    ?>




        <footer>
            <p>AcaTisM App, Copyright &copy; 2019</p>
        </footer>
    </body>
   
</html>
