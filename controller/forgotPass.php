<?php
include_once "../classes/Database.php";
if(isset($_GET['email']) && !empty($_GET['email'])){
    include_once '../classes/user.php';
    $user = new User($db);
    if($user->forogPass()){

    }else{

    }
}
?>
