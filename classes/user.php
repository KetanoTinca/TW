<?php


	class User
	{
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
		/*
		constructor
		-------------
		methods
		*/
		public function accountLogin()
    	{
        	$sql = "SELECT *
            	    FROM user
                	WHERE username=:user
                	AND pass=:pass
                       LIMIT 1";
           
            echo $sql;        
        	try
        	{
            	$stmt = $this->_db->prepare($sql);
            	$stmt->bindParam(':user', $_POST['username'], PDO::PARAM_STR);
                $stmt->bindParam(':pass', $_POST['password'], PDO::PARAM_STR);
                
            	$stmt->execute();
            	if($stmt->rowCount()==1)
            	{
               		$_SESSION['Username'] = htmlentities($_POST['username'], ENT_QUOTES);
               		$_SESSION['LoggedIn'] = 1;
                	return TRUE;
            	}
            	else
            	{
                	return FALSE;
            	}
        	}
        	catch(PDOException $e)
        	{
                echo $e->getMessage();
            	return FALSE;
        	}
    	}
        /*
        -------------
        
        public function createAccount()
        {
            $username = trim($_POST['fname']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            $sql = "SELECT COUNT(USERNAME) AS theCount
                    FROM users
                    WHERE USER_NAME=:username
                    and EMAIL=:email
                    and PASSWORD=:password";
            try
            {
                if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    if($row['theCount']!=0)
                    {
                        return "<h2> Error </h2>"
                            . "<p> Sorry, those credentials are already in use. "
                            . "Please try again. </p>";
                    }
                    $stmt->closeCursor();
                }
 
                $sql = "INSERT INTO users(USER_NAME, EMAIL, PASSWORD)
                        VALUES(:username, :email, :password)";
                if($stmt = $this->_db->prepare($sql)) 
                {
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                    
                    return "<h2> Success! </h2>"
                            . "<p> Your account was successfully "
                            . "created with the username <strong>$username</strong>."
                            . " Check your email!";
                }
                else
                {
                    return "<h2> Error </h2><p> Couldn't insert the "
                        . "user information into the database. </p>";
                }
            }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }
        }
        /*
        -------------
        
        public function forgotPassword()
        {
            $username = trim($_POST['name']);
            $email = trim($_POST['email']);
             $sql = "SELECT PASSWORD AS theCount
                    FROM users
                    WHERE USER_NAME=:username
                    and EMAIL=:email";
            if($stmt = $this->_db->prepare($sql))
            {
                $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                $stmt->execute();
                $row = $stmt->fetch();
                $stmt->closeCursor();
                if($row['theCount']!=NULL)
                {
                    return $row['theCount'];
                }
                else
                {
                    return "<p>Couldn't find your account, try again.</p>";
                }
            }
        }
        */
	}
?>