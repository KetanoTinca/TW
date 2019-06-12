<?php

include_once '../classes/crypt.php';

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
            $sql = "SELECT id,userType,firstname,lastname,email
            	    FROM user 
                	WHERE username=:user
                	AND pass=:pass
                       LIMIT 1";

            echo $sql;
            try {
                $stmt = $this->_db->prepare($sql);
                $pass_enc = new Crypt((trim($_POST['password'])),'st');
            
                $pass=$pass_enc->getString();
                $stmt->bindParam(':user', $_POST['username'], PDO::PARAM_STR);
                $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

                $stmt->execute();
                if ($stmt->rowCount() == 1) {
                    $_SESSION['Username'] = htmlentities($_POST['username'], ENT_QUOTES);
                    $_SESSION['LoggedIn'] = 1;
                    $result = $stmt->fetch();

                    $_SESSION['firstName'] = htmlentities($result[2], ENT_QUOTES);
                    $_SESSION['lastName'] = htmlentities($result[3], ENT_QUOTES);

                    $_SESSION['email'] = htmlentities($result[4], ENT_QUOTES);
                    if($result[1] == 1){
                        $_SESSION['userType'] = 'student';
                        $sql2 = "SELECT id,board_fk
            	    FROM student 
                	WHERE user_fk=:user_fk
                	
                       LIMIT 1";
                    $stmt2 = $this->_db->prepare($sql2);
                    $stmt2->bindParam(':user_fk',$result[0], PDO::PARAM_STR);
                    $stmt2->execute();
                    if ($stmt2->rowCount() == 1) {
                        $result2 = $stmt2->fetch();
                   
                        $_SESSION['student_id'] = $result2[0];
                        $_SESSION['board']=$result2[1];
                    
                    }else{
                        return FALSE;
                    }

                       
                    }else{
                        $_SESSION['userType'] = 'teacher';
                        $sql2 = "SELECT id
            	    FROM teacher 
                	WHERE user_fk=:user_fk
                	
                       LIMIT 1";
                    $stmt2 = $this->_db->prepare($sql2);
                    $stmt2->bindParam(':user_fk',$result[0], PDO::PARAM_STR);
                    $stmt2->execute();
                    if ($stmt2->rowCount() == 1) {
                        $result2 = $stmt2->fetch();
                   
                        $_SESSION['teacher_id'] = $result2[0];
                    
                    }else{
                        return FALSE;
                    }
                    }
                    // $_SESSION['user_id'] = $result[0];
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
            // $pass = trim($_POST['password']);
            // $pass =crypt(trim($_POST['password']),'st');
            $pass_enc = new Crypt((trim($_POST['password'])),'st');
            
            $pass=$pass_enc->getString();
           // echo $pass;
            if($_POST['userType'] == "student"){
                $userType = 1;
                $git = trim($_POST['gitRepo']);
                $aGrade = trim($_POST['averageGrade']);
                $studyYear = trim($_POST['studyYear']);
            }else{
                $userType = 0;
                $degree = trim($_POST['degree']);
                $web=trim($_POST['teacherWebSite']);
            }
            echo $degree . ' ' . $web;
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
                echo $sql;
                echo "<br>";
                if($userType == 1){
                    $sql2 = "INSERT INTO student  VALUES (NULL, :studyYear, :git, :averageGrade, 0, (SELECT id FROM user WHERE username like :username AND pass like :password))";
                }
                else
                {
                    $sql2 = "INSERT INTO teacher  VALUES (NULL, :degree, :web, (SELECT id FROM user WHERE username like :username AND pass like :password))";

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
                   if(!$userType){
                       echo "here";
                       $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                       $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
                       $stmt->bindParam(":degree", $degree, PDO::PARAM_STR);
                       $stmt->bindParam(":web", $web, PDO::PARAM_STR);
                       $stmt->execute();
                       $stmt->closeCursor();
                       $status=$status+1;

                   }else{
                       echo "here2";
                       echo $studyYear . ' ' . $git . ' ' . $aGrade;
                       $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                       $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
                       $stmt->bindParam(":studyYear", $studyYear, PDO::PARAM_INT);
                       $stmt->bindParam(":git", $git, PDO::PARAM_STR);
                       $stmt->bindParam(":averageGrade", $aGrade, PDO::PARAM_STR);
                       $stmt->execute();
                       $stmt->closeCursor();
                       $status=$status+1;
                   }



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