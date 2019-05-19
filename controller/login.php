<?php
      
include_once "../classes/Database.php";


function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
        if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
            session_destroy();
           Redirect('../views/view-profs.php', false);
            echo "sunt in sesiune";
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