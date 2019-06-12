<!DOCTYPE html>
<html lang= "en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
        <meta name="keywords" content="web application, faculty, thesis, licence, education">
        <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
        <title>AcaTisM | View Students </title>
        <link rel="stylesheet" href="../CSS/style_view_studs.css">
    </head>
    <body>
        <header>
        <?php include 'navbar.php';?>
        </header>

     
        <?php include 'user.description.php';?>

        <section id="student_list">
                <div id="head">
                    <h1>Follow your students' progress!</h1>
                    <p>You can see here the name of the students enrolled in one of your projects, as well as the name of the project and its status. You also can take a look at their boards, to add tasks and see what they've submitted so far.</p>
                </div>
                <table id="students">
                    <tr>
                        <th>Students</th>
                        <th>Name of the project</th>
                        <th>Progress</th>
                        <th>Board</th>
                    </tr>
                    <tr>
                        <th>Birleanu, Andrei</th>
                        <th><p>Find my car</p></th>
                        <?php  include_once "../classes/board.php";
                      include_once "../classes/Database.php";
                        $board = new Board($db);
                     echo $board->getPercent();
                        ?>
                        <th><button class="small_button" onclick="location.href='./progress.html'">Board</button></th>
                    </tr>
                    <tr>
                        <th>Velicescu, Laura</th>
                        <th><p>Top Music</p></th>
                        <th>60%</th>
                        <th><button class="small_button" onclick="location.href='./progress.html'">Board</button></th>
                    </tr>
                    <tr>
                        <th>Tinka Ketano</th>
                        <th><p>Just Dance for Mobile</p></th>
                        <th>75%</th>
                        <th><button class="small_button" onclick="location.href='./progress.html'">Board</button></th>
                    </tr>
                    <tr>
                        <th>Mihai Sorina Elena</th>
                        <th><p>Photoshop v2.0</p></th>
                        <th>10%</th>
                        <th><button class="small_button" onclick="location.href='./progress.html'">Board</button></th>
                    </tr>
                    <tr>
                        <th>Ionescu, Popescu</th>
                        <th><p>Linux translator</p></th>
                        <th>33%</th>
                        <th><button class="small_button" onclick="location.href='./progress.html'">Board</button></th>
                    </tr>
                    
                </table>
        </section>
        <footer>
            <p>AcaTisM App, Copyright &copy; 2019</p>
        </footer>
    </body>
</html>