<?php

class Theme{
    private $_db;
    private $title;
    private $description;
    private $academicYear;
    private $teacher_Fk;

    public function __construct($db=NULL,$title,$description,$academicYear,$teacher_Fk)
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
            
            $this->title=$title;
            $this->description=$description;
            $this->academicYear=$academicYear;
            $this->teacher_Fk=$teacher_Fk;
        }
    public function addTheme(){
        try{
         $sql = "INSERT INTO theme VALUES (NULL, :teacher, :title, :descript, :academicYear)";
      //  $sql='INSERT INTO theme VALUES(NULL, ' . $this->teacher_Fk . ' ,"' . $this->title . '", "' . $this->description . '", "' . $this->academicYear . '")';
       echo $sql;
        if($stmt = $this->_db->prepare($sql))
                {
                    echo $this->teacher_Fk;
                    echo $this->academicYear;
                    echo $this->title; 
                    echo $this->description;
                    // $this->description='dsafa';
                     $stmt->bindParam(":teacher", $this->teacher_Fk, PDO::PARAM_STR);
                     $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
                     $stmt->bindParam(":descript",$this->description , PDO::PARAM_STR);
                     $stmt->bindParam(":academicYear", $this->academicYear, PDO::PARAM_STR);
                   
                    $stmt->execute();
                    $stmt->closeCursor();
                   // $status=$status+1;
                   return TRUE;  
                }
                else
                {
                    return FALSE;
                }   
                   
    }catch(PDOException $e)
    {
        return $e->getMessage();
    }
               
    }   

}

?>