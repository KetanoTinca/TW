<?php
      
include_once "../classes/Database.php";


function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
        if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
           // session_destroy();
           Redirect('../views/view-profs.php', false);
            echo "sunt in sesiune";

        }else{
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                include_once '../classes/user.php';
                //echo "sunt in logare";
                $user = new User($db);
                if($user->accountLogin()=== TRUE){
                    echo "1";
                    if(!empty($_POST['remember'])){
                        echo "2";
                        setcookie('username', $_POST['username'],time()+60*60*24*30,"/");
                        //echo "console.log('pun cookie')";
                       // Redirect('../views/view-profs.php', false);

                    }else{
                        echo "3";
                        unset($_COOKIE['username']);
                        setcookie('username', '',time()-3600,"/");
                            //echo "console.log('nu pun cookie')";

                    }
                    if($_SESSION['userType']=='student'){
                        if($_SESSION['board']==0)
                           // echo "e student si nu are board";
                       Redirect('../views/view-profs.php', false);
                        else{
                                //echo "e student da are board";
                            Redirect('../views/user.php', false);
                        }

                    }else{
                        echo "e profesor";
                        Redirect('../views/user.php', false);

                    }
                }else{
                    echo "x";
                 Redirect('../views/login.php?status=wrong', false);
                }
            }
        }
?>