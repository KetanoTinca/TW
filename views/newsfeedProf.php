
<div class="container" style="background-color: white;">
    <div class="text" >
        <h1>Timeline</h1>
        <form class="add-theme-form" method="post" action ="../controller/addPost.php">
            <p style = " text-align: left; margin: 0; width:100% ">Do you want to add a new post for your students?</p>
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
    <?php
    $sql = "SELECT * FROM post p inner join theme t on p.theme_fk=t.id where t.teacher_fk = :teacher_id order by p.postDate desc";
    try{
        $stmt=$db->prepare($sql);
        $stmt->bindParam(':teacher_id', $_SESSION['teacher_id'],PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch())
        {
            //  echo "<li>".$row['taskDescription']." with deadline ".$row['deadline']."</li>";
            echo "<p>Title: " . $row[1] . "</p>";
            echo "<p>" . $row[2] . " Postat la data : " . $row[3] . "</p>";
            echo "<p>Pentru tema :" . $row[7] . "</p>";


        }
    }catch(PDOException $e){
        echo $e->getMessage();

    }

    ?>
</div>
