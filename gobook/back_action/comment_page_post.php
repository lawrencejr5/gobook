<?php

include "../backend/database.php";
$uID = $_SESSION['id'];
$database = new Database;

if(isset($_POST['commenter_id'])){
    $post_id = $_POST['post_id'];
    $commenter_id = $_POST['commenter_id'];
    $page_id = $_POST['page_id'];
    $comment = $_POST['comment'];
    $data = [];
    $done = $database -> comment_page_post($post_id, $commenter_id, $page_id, $comment);
    if($done){
            $data['page_post_comments'] = $database -> get_page_post_comments($post_id);
            // $data['num_of_comments'] = $database -> numOf_page_post_comments($post_id);
            foreach($data['page_post_comments'] as $d){
                $comment = $d['comment'];
                $commenter_id = $d['commenter_id'];
                $get_user = $database -> getUser($commenter_id);
                foreach($get_user as $u){
                    $username = $u['username'];
                    $profileImg = $u['profile_pic'];
                    $verified = $u['verified'];
        ?>
            <div class="comments_layout">
                    <div class="commenter">
                        <img src="../../assets/profilePics/<?=$profileImg?>" alt="" width="20px" height="20px">
                    </div>
                    <div class="comment">
                        <b class="commenter_name">@<?=$username?></b><br>
                        <span><?= $comment ?></span>
                    </div>
            </div>
        <?php 
                }
            }
    }
}