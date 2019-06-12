<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | View Teachers! </title>
    <link rel="stylesheet" href="../CSS/style_view_profs.css?version=7">
</head>

<body>

<?php include 'navbar.php';
                include '../classes/Database.php';
                include '../controller/session.php';
                ?>


        <section id="teacher_list">
            <div>
                <?php
                if(isset($_SESSION['userType'])){

                    echo "<h1 id='logged_message'> Hello " . $_SESSION['userType'] . " please choose your teacher and wait to be accepted.</h1>";
                }

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
                <tr>
                    <th>Name, Surname</th>
                    <th><a href="./form.html">Subject1</a></th>
                    <th><button class="small_button"
                            onclick="location.href='./form.php'">Apply</button>
                    </th>
                </tr>
                <tr>
                    <th>Name, Surname</th>
                    <th><a href="./form.html">Subject2</a></th>
                    <th><button class="small_button"
                            onclick="location.href='./form.php'">Apply</button>
                    </th>
                </tr>
                <tr>
                    <th>Name, Surname</th>
                    <th><a href="./teacher-descriptions/name-surname">Subject3</a></th>
                    <th><button class="small_button"
                            onclick="location.href='./form.php'">Apply</button>
                    </th>
                </tr>
                <tr>
                    <th>Name, Surname</th>
                    <th><a href="./form.html">Subject4</a></th>
                    <th><button class="small_button"
                            onclick="location.href='./form.php'">Apply</button>
                    </th>
                </tr>
                <tr>
                    <th>Name, Surname</th>
                    <th><a href="./form.html">Subject5</a></th>
                    <th><button class="small_button"
                            onclick="location.href='./form.php'">Apply</button>
                    </th>
                </tr>
            </table>
            <div class="button_wrapper">
                <button class="small_button" id="cancel_button">Cancel your current thesis request</button>
            <div>
        </section>
        <footer>
            <p>AcaTisM App, Copyright &copy; 2019</p>
        </footer>
    </div>
</body>

</html>