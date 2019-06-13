<?php

class Request{
    private $_db;
    private $student_Fk;
    private $theme_Fk;
    private $status;

    public function __construct($db=NULL, $theme_Fk, $student_Fk)
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

        $this->student_Fk=$student_Fk;
        $this->theme_Fk=$theme_Fk;
        $this->status=0;
    }
    public function addRequest(){
        try{
            $sql = "INSERT INTO request VALUES (NULL, :student, :theme, :status)";

           
            if($stmt = $this->_db->prepare($sql))
            {
                echo $this->student_Fk;
                echo $this->theme_Fk;
                echo $this->status;
                $stmt->bindParam(":student",$this->student_Fk , PDO::PARAM_STR);
                $stmt->bindParam(":theme", $this->theme_Fk, PDO::PARAM_STR);
                $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

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