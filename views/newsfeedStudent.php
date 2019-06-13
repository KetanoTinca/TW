
<div class="container" style="background-color: white;">
    <div class="text" >
        <h1>Timeline</h1>


    </div>
    <?php
    $sql = "select p.* from post p inner join theme t on p.theme_fk=t.id inner join board b on t.id=b.theme_fk inner join student s on s.id=b.student_fk inner join user u on u.id=s.user_fk
where s.id = :student_id order by p.postDate desc";
    try{
        $stmt=$db->prepare($sql);
        $stmt->bindParam(':student_id', $_SESSION['student_id'],PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch())
        {
            //  echo "<li>".$row['taskDescription']." with deadline ".$row['deadline']."</li>";
            echo "<p>Title: " . $row[1] . "</p>";
            echo "<p>" . $row[2] . " Postat la data : " . $row[3] . "</p>";



        }
    }catch(PDOException $e){
        echo $e->getMessage();

    }

    ?>
</div>
