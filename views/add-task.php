<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | Add Task </title>
    <link rel="stylesheet" type="text/css" href="../CSS/task.css">
</head>

<body>

    <?php include 'navbar.php';?>
    <?php
if( isset($_GET['status']) )
{
    if(isset($_GET['status']) && isset($_GET['title']) && isset($_GET['description']) && isset($_GET['deadline'])){
    
    include_once "../classes/board.php";
    include_once "../classes/Database.php";
      $board = new Board($db);
      $board->postTask(1,$_GET['title'],$_GET['description'],$_GET['deadline'],$_GET['status']); 
      header("Location: progress.php", true, 301);
    }
    
      

}
?>
    <section>
        <div class="section-wrapper">
            <div></div>
            <div>
                <h1>Add a task</h1>
                <div class="form-container">
                    <form method = "get" action = "../views/add-task.php">
                        <?php 
                       
                        if (isset($_GET['status'])) {
                            
                            if($_GET['status']==10){
                                echo "<input type=\"hidden\" name=\"status\" value=1 style=\"dipsplay: none;\" readonly>";
                            }
                            else
                            echo "<input type=\"hidden\" name=\"status\" value=".$_GET['status']." style=\"dipsplay: none;\" readonly>";
                        } 
                        ?>

                            <label for="Title">Title</label>
                            <input type="text" name="title" id="title" autofocus>
                            <br>
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description">
                            <br>
                            <label for="deadline">Deadline</label>
                            <input type="date" name="deadline" id="deadline">
                            <br>
                            <input id="task" tabindex="0" type="submit" class="button" value="Submit">

                        </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>