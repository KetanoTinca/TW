<?php

if(!isset($_SESSION['LoggedIn'])){
    header('Location: ../views/login.php' , true);
}
?>