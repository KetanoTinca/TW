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

    <section>
        <div class="section-wrapper">
            <div></div>
            <div>
                <h1>Add a task</h1>
                <div class="form-container">
                    <form method = "post" action = "../controller/add-task.php">
                        <?php if(isset($_GET['status']) && $_GET['status'] == 'wrong'  ){
                            echo "<p>Error! Couldn't add the task.</p>";
                        }
                        if (isset($_GET['status']) && $_GET['status'] == 'confirm') {
                            echo "<p>Task succefully added!</p>";
                        }  ?>

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