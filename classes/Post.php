<?php

class Post{
    private $_db;
    private $title;
    private $description;
    private $time;
    private $themeFk;

    public function __construct($db=NULL,$title,$description,$time,$themeFk)
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
        $this->time=$time;
        $this->themeFk=$themeFk;
    }
    public function addPost(){
        try{
            $sql = "INSERT INTO post VALUES (NULL, :title, :content, :postDate, :theme_fk)";
            //  $sql='INSERT INTO theme VALUES(NULL, ' . $this->teacher_Fk . ' ,"' . $this->title . '", "' . $this->description . '", "' . $this->academicYear . '")';
            echo $sql;
            if($stmt = $this->_db->prepare($sql))
            {

                // $this->description='dsafa';
                $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
                $stmt->bindParam(":content", $this->description, PDO::PARAM_STR);
                $stmt->bindParam (":postDate", date ("Y-m-d H:i:s"), PDO::PARAM_STR);
                $stmt->bindParam(":theme_fk", $this->themeFk, PDO::PARAM_STR);

                $stmt->execute();
                $stmt->closeCursor();

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