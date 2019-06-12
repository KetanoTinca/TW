<?php

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}
include '../classes/Database.php';
if(!empty($_POST['themeTitle']) && !empty($_POST['themeDescription']) && !empty($_POST['academicYear'])){
    include_once '../classes/Theme.php';
    echo "sunt in logare";
    
    echo $_SESSION['teacher_id'];
    
    $theme = new Theme($db,$_POST['themeTitle'],$_POST['themeDescription'],$_POST['academicYear'],$_SESSION['teacher_id']);
    if($theme->addTheme()=== TRUE){
        Redirect('../views/add-theme.php?action=added', false);

    }else{
        Redirect('../views/user.php?status=wrong', false);
    }
}

?>