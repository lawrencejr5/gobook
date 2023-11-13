<?php

include "../backend/database.php";
$uID = $_SESSION['id'];
$database = new Database;

if(isset($_POST['liker_id'])){
    $post_id = $_POST['post_id'];
    $liker_id = $_POST['liker_id'];
    $page_id = $_POST['page_id'];
    $like_type = $_POST['like_type'];
    $return = [];
    $done = $database -> like_page_post($post_id, $liker_id, $page_id, $like_type);
    if($done){
        $return['likes'] = $database -> num_of_page_post_likes($post_id, $like_type);
    }
        echo json_encode($return['likes']);
}