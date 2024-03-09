<?php

include_once "../backend/database.php";
$uID = $_SESSION['id'];

$database = new Database;



if(isset($_POST['liker'])){
    $user_id = $_POST['userId'];
    $user_id2 = $_POST['userId2'];
    $user_img = $_POST['userImg'];
    $user_img2 = $_POST['userImg2'];
    $user = $_POST['liker'];
    $user2 = $_POST['poster'];
    $post_id = $_POST['postId'];
    $verified = $_POST['verified'];
    $type = "like";
    $return = [];

    $database = new Database;
    $liked = $database -> like($user_id, $post_id, $user, $user_img, $verified);
    
    
    if($liked == true){
        // $database -> createNotification($user_id, $user_id2, $user, $user2, $user_img, $user_img2, $verified, $type);
        echo $database->likes($post_id);
    }
}