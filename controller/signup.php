<?php

include_once "../classes/Database.php";


function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}
//echo $_POST['userName'];
//echo "\n";
//
//
//
//echo $_POST['email'];
//echo "\n";
//echo $_POST['firstName'];
//echo "\n";
//echo $_POST['lastName'];
//echo "\n";
//echo $_POST['password'];
//echo "\n";
//echo $_POST['userType'];
//echo "\n";

    if(!empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['userType'])){
        include_once '../classes/user.php';
        echo "sunt in logare";
        $user = new User($db);
        if($user->createAccount()== 1){
            Redirect('../views/login.php?status=confirm', false);
            echo "m-am inregistrat";
        }else{
            Redirect('../views/signup.php?status=wrong1', false);
        }
    }

?>