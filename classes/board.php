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
                    {
                            echo "<li>".$row['taskDescription']." with deadline ".$row['deadline']."</li>";
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
                            echo "<li>".$row['title']." with deadline ".$row['deadline']."</li>";
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
                            echo "<li>".$row['title']." with deadline ".$row['deadline']."</li>";
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
   

      
}
?>