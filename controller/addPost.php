<?php

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

include '../classes/Database.php';
if(!empty($_POST['title']) && !empty($_POST['postContent']) && !empty($_POST['themeId'])){
    include_once '../classes/Post.php';


    echo $_SESSION['teacher_id'];

    $post = new Post($db,$_POST['title'],$_POST['postContent'],time(),$_POST['themeId']);
    if($post->addPost()=== TRUE){
        Redirect('../views/user.php?action=added', false);

    }else{
        Redirect('../views/user.php?status=wrong', false);
    }
}

?>