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

    <?php include 'user.description.php';?>

           <div class="container" style="background-color: white;">
                <div class="text" >
                    <h1>Timeline</h1>
                    <form method="post" action ="../controller/addPost.php">
                        <p>Do you want to add a new post for your students?</p>
                        <input type="text" name ="title" id="title">
                        <textarea id="postContent" name="postContent" required placeholder="smth..." rows="5" cols="60"></textarea>
                        <?php
                        echo "<select id=\"themeId\" name=\"themeId\" >";
                        $sql = "SELECT id,themeName
            	    FROM theme 
                	WHERE teacher_fk=:teacher_fk
                	";
                        try{
                            $stmt = $db->prepare($sql);


                            $stmt->bindParam(':teacher_fk', $_SESSION['teacher_id'], PDO::PARAM_STR);
                            $stmt->execute();
                            while($row = $stmt->fetch())
                            {
                              //  echo "<li>".$row['taskDescription']." with deadline ".$row['deadline']."</li>";
                                echo "<option value=\"$row[0]\">$row[1]</option>";

                            }

                        }catch (PDOException $e){
                            echo $e->getMessage();

                        }

                        ?>
                        <input type="submit" id="addPost"value="POST">

                    </form>

                </div>
                <ul class="active">
                    <li><p><a href="#">Andrei Birleanu</a> moved <span>Intefata aplicatie</span> from <b>In Lucru</b> to <b>Facute</b></p>
                    <p> Monday, 10 Mar 2019, 2:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Laura Velicescu</a> moved <span>Bug baza de date</span> from <b>Testare</b> to <b>TO DO LIST</b></p>
                    <p> Monday, 10 Mar 2019, 1:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Andrei Birleanu</a> moved <span>Intefata aplicatie</span> from <b>TO DO LIST</b> to <b>In Lucru</b></p>
                    <p> Monday, 6 Mar 2019, 4:20 AM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Tinca Ketano</a> moved <span>Alegere proiect</span> from <b>In Lucru</b> to <b>Facute</b></p>
                    <p> Monday, 1 Mar 2019, 6:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Laura Velicescu</a> moved <span>Conectare baza de date</span> from <b>In Lucru</b> to <b>Facute</b></p>
                    <p> Monday, 1 Mar 2019, 2:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                </ul>
                <button onclick="myFunction()" id="show-more">Load more activity <span id="dots">...</span></button>
                <ul id="hidden-list">
                    <li><p><a href="#">Andrei Birleanu</a> moved <span>Intefata aplicatie</span> from <b>In Lucru</b> to <b>Facute</b></p>
                    <p> Monday, 10 Mar 2019, 2:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Laura Velicescu</a> moved <span>Bug baza de date</span> from <b>Testare</b> to <b>TO DO LIST</b></p>
                    <p> Monday, 10 Mar 2019, 1:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Andrei Birleanu</a> moved <span>Intefata aplicatie</span> from <b>TO DO LIST</b> to <b>In Lucru</b></p>
                    <p> Monday, 6 Mar 2019, 4:20 AM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Tinca Ketano</a> moved <span>Alegere proiect</span> from <b>In Lucru</b> to <b>Facute</b></p>
                    <p> Monday, 1 Mar 2019, 6:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                    <li><p><a href="#">Laura Velicescu</a> moved <span>Conectare baza de date</span> from <b>In Lucru</b> to <b>Facute</b></p>
                    <p> Monday, 1 Mar 2019, 2:36 PM  in <a href="$"><b>Licenta 2019</b></a></p></li>
                </ul>
           </div>

        <footer>
            <p>AcaTisM App, Copyright &copy; 2019</p>
        </footer>
    </body>
   
</html>
