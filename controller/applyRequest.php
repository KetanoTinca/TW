<?php
function redirect($url, $statusCode = 303)
{
header('Location: ' . $url, true, $statusCode);
die();
}

include '../classes/Database.php';
if(!empty($_POST['themeId'])){
include_once '../classes/Request.php';

$request = new Request($db,$_POST['themeId'],$_SESSION['student_id']);

if($request->addRequest()=== TRUE){
Redirect('../views/application-form.php?action=added&id=' . $_POST['themeId'], false);

}else{
Redirect('../views/application-form.php?action=wrong&id=' . $_POST['themeId'], false);
}
}

if($request->deleteRequests($_SESSION['student_id'])==TRUE){
    Redirect('../views/view-profs.php?action=deleted', false);
}else{
    Redirect('../views/view-profs.php', false);
}

?>