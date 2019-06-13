<?php

class Board{

    private $_db;
		
		public function __construct($db=NULL)
		{
			if(is_object($db))
			{
				$this->_db = $db;
			}
			else
			{
				$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            	$this->_db = new PDO($dsn, DB_USER, DB_PASS);
			}
        }
        
    public function getPercent(){
            $all = 0;
            $done = 0;
            $sql = 'select count(*) from task';
            $sql2= 'select count(*) from task where status=3';

            if($stmt = $this->_db->prepare($sql)){
                $stmt->execute();
                $row = $stmt->fetch();
                $all = $row[0];
            }
            if($stmt = $this->_db->prepare($sql2)){
                $stmt->execute();
                $row = $stmt->fetch();
                $done = $row[0];
            }
            if($all == 0){
            $percent = 0;
            }else{
            $percent = round(($done * 100 / $all),2);
            }
            echo "<th>" . $percent . "% </th>";
    }    

    public function getToDo($boardID){
        $sql = "select * from task where status = 0 and " ."board_fk = " . $boardID;
        if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->execute();
                    while($row = $stmt->fetch())
                    {   echo   "<form action=\"./progress.php\" method=\"get\">";
                        echo  "<button name=\"plus\" value=\"".$row['id']."\" type=\"submit\">+</button>";
                        echo "<li>".$row['title']." with deadline ".$row['deadline']."</li>";
                        echo "</form>";
                       
                       
                    }
    
    
    }
    
    }

    public function getInProgress($boardID){
        $sql = "select * from task where status = 1 and " ."board_fk = " . $boardID;
        if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->execute();
                    while($row = $stmt->fetch())
                    {
                        echo   "<form action=\"./progress.php\" method=\"get\">";
                        echo  "<button name=\"plus\" value=\"".$row['id']."\" type=\"submit\">+</button>";
                        echo "<li>".$row['title']." with deadline ".$row['deadline']."</li>";
                        echo "</form>";
                    }
    
    
    }
    
    }

    public function getFeedback($boardID){
        $sql = "select * from task where status = 2 and " ."board_fk = " . $boardID;
        if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->execute();
                    while($row = $stmt->fetch())
                    {
                        echo   "<form action=\"./progress.php\" method=\"get\">";
                        echo  "<button name=\"plus\" value=\"".$row['id']."\" type=\"submit\">+</button>";
                        echo "<li>".$row['title']." with deadline ".$row['deadline']."</li>";
                        echo "</form>";
                    }
    
    
    }
    
    }

    public function getDone($boardID){
        $sql = "select * from task where status = 3 and " ."board_fk = " . $boardID;
        if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->execute();
                    while($row = $stmt->fetch())
                    {       
                        echo "<li>".$row['title']." with deadline ".$row['deadline']."</li>";
                    }
    
    
    }
    
    }

    public function postTask($boardID,$taskTitle,$taskDescription, $taskDeadline, $taskStatus){

        $sql = "INSERT into task (board_fk,deadline,taskDescription, title,status) values (".$boardID.",'".$taskDeadline."','".$taskDescription."', '".$taskTitle."' ,".$taskStatus.")";
        
        if($stmt = $this->_db->prepare($sql)){
            $stmt->execute();
        
    }

    }

    public function updateTaks($taskID){

        $sql ="UPDATE task set status = status+1 where id = " .$taskID;

        if($stmt = $this->_db->prepare($sql)){
            $stmt->execute();
        }
    }
   
    public function getTheme($boardID){
        $sql = "select theme_fk from board where id=" .$boardID;
        if($stmt = $this->_db->prepare($sql)){
            $stmt->execute();
            $row=$stmt->fetch();
            $themeFK = $row[0]; 
            $sql = "select teacher_fk, themeName from theme where id=" .$themeFK;
            if($stmt = $this->_db->prepare($sql)){
                $stmt->execute();
                $row=$stmt->fetch();
                $teacherFK=$row[0];
                $themeName = $row[1];
                

                 echo $themeName;
                    
            }
        }

        
    }

    public function getLastCommit($owner,$repo){

        define('URL', "localhost/TW/api/git.php/?owner=".$owner."&repo=".$repo);
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, URL);              // stabilim URL-ul serviciului
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);  // rezultatul cererii va fi disponibil ca șir de caractere
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); // nu verificam certificatul digital
        $res = curl_exec($c);                           // executam cererea GET
        curl_close($c);

    // echo $res;


    // // procesam rezultatul via DOM
    $obj = json_decode($res);
        echo "Latest Commit: Made by ". $obj->user." with the message " . $obj->commit . " on " . $obj->date ;
    }

    public function getBoardId($studentFK){

        $sql = "Select board_fk from student where id=:studentID";
        if($stmt = $this->_db->prepare($sql)){
            $stmt->bindParam(":studentID",$studentFK,PDO::PARAM_STR);
            $stmt->execute();
            $row= $stmt->fetch();
            return $row[0];
        }

    }
      
}


?>