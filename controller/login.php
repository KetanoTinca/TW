<?php
      
include_once "../classes/Database.php";


function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
        if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
<<<<<<< HEAD
          Redirect('../views/view-profs.php', false);
=======
<<<<<<< HEAD
=======
           // session_destroy();
>>>>>>> 51ba4768c199b3695f370e344f13b47595474ba8
           Redirect('../views/view-profs.php', false);
            echo "sunt in sesiune";
>>>>>>> cd7e3b35bdebbe0155d72b4b07e2c2c25b947160
        }else{
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                include_once '../classes/user.php';
                echo "sunt in logare";
                $user = new User($db);
                if($user->accountLogin()=== TRUE){
                    Redirect('../views/view-profs.php', false);
                    echo "m-am logat";
                }else{
                    Redirect('../views/login.php?status=wrong', false);
                }
            }
        }
?>