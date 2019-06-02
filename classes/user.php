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
            $sql = "SELECT userType
            	    FROM user
                	WHERE username=:user
                	AND pass=:pass
                       LIMIT 1";

            echo $sql;
            try {
                $stmt = $this->_db->prepare($sql);
                $stmt->bindParam(':user', $_POST['username'], PDO::PARAM_STR);
                $stmt->bindParam(':pass', $_POST['password'], PDO::PARAM_STR);

                $stmt->execute();
                if ($stmt->rowCount() == 1) {
                    $_SESSION['Username'] = htmlentities($_POST['username'], ENT_QUOTES);
                    $_SESSION['LoggedIn'] = 1;
                    $result = $stmt->fetch();
                    if($result[0] == 1){
                        $_SESSION['userType'] = 'student';
                    }else{
                        $_SESSION['userType'] = 'teacher';
                    }
                    return TRUE;
                } else {
                    return FALSE;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return FALSE;
            }
        }


        public function createAccount()
        {
            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
            $username = trim($_POST['userName']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['password']);
            if($_POST['userType'] == "student"){
                $userType = 1;
            }else{
                $userType = 0;
            }
            echo $userType;
            echo "<br>";

            $sql = "SELECT COUNT(USERNAME) AS theCount
                    FROM user
                    WHERE username=:username;";
            echo "Status0<br>";
            try
            {
                if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    if($row['theCount']!=0)
                    {
                        return 0;
                    }
                    $stmt->closeCursor();
                }
                echo "status1<br>";
                $status=0;

                $sql = "INSERT INTO user VALUES (NULL, :username, :password, :userType, :firstName, :lastName, :email , null, null )";
                //$sql = "INSERT INTO user VALUES (NULL,'" . $username . "','" . $pass . "'," . $userType . ",'" . $firstName . "','" . $lastName . "','" . $email . "')";
                echo $sql;
                echo "<br>";
                if($userType == 1){
                    $sql2 = "INSERT INTO student (user_fk) VALUES ((SELECT id FROM user WHERE username like :username AND pass like :password))";
                    //$sql2 = "INSERT INTO student (user_fk) VALUES (select id from user where username like '" . $username . "' and pass like '" . $pass . "')";
                }
                else
                {
                    $sql2 = "INSERT INTO teacher (user_fk) VALUES ((SELECT id FROM user WHERE username like :username AND pass like :password))";

                    //$sql2 = "INSERT INTO teacher (user_fk) VALUES (select id from user where username like '" . $username . "' and pass like '" . $pass . "')";
                }
                echo $sql . "<br> " . $sql2;
                echo "<br>";
                if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR);
                    $stmt->bindParam(":lastName", $lastName, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
                    $stmt->bindParam(":userType", $userType, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $status=$status+1;

                }
                else
                {
                    return 0;
                }
                $data = $stmt->fetchAll();
                echo $data . "<Br>";
                if($stmt = $this->_db->prepare($sql2))
                {
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $status=$status+1;

                }
                else
                {
                    return 0;
                }


               if($status == 2){
                   return 1;
               } else{
                   return 0;
               }
            }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }
        }


        
//        public function forgotPassword()
//        {
//            $username = trim($_POST['name']);
//            $email = trim($_POST['email']);
//             $sql = "SELECT PASSWORD AS theCount
//                    FROM users
//                    WHERE USER_NAME=:username
//                    and EMAIL=:email";
//            if($stmt = $this->_db->prepare($sql))
//            {
//                $stmt->bindParam(":username", $username, PDO::PARAM_STR);
//                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
//                $stmt->execute();
//                $row = $stmt->fetch();
//                $stmt->closeCursor();
//                if($row['theCount']!=NULL)
//                {
//                    return $row['theCount'];
//                }
//                else
//                {
//                    return "<p>Couldn't find your account, try again.</p>";
//                }
//            }
//        }
//        */
	}
?>