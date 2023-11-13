<?php

include_once "../backend/database.php";
$uID = $_SESSION['id'];
if(isset($_POST['getData'])){
    $start = $_POST['start'];
    $limit = $_POST['limit'];
    
    $database = new Database;
    $data['postsss'] = $database -> getPostsss($start, $limit);
    
    if($database -> numOfPostsss($start, $limit) > 0){
        foreach ($data['postsss'] as $d) {
            $postId = $d['id'];
            $userId = $d['user_id'];
            $poster = $d['poster'];
            $datetime = $d['datetime'];
            $text_post = $d['text_post'];
            $img_post = $d['img_post'];
            $verified = $d['verified'];
            $poster_img = $d['poster_img'];
            $anonymous = $d['anonymous'];
            
    ?>
    <div class="post">
        <div class="profile">
            <?php
            if ($anonymous == 'yes') {
                echo '
                <img src="../assets/profilePics/user.png" height="20px" width="20px" alt="" style="border-radius: 50%;">
                <b class="profile_name">@anonymous</b> 
                ';
            } else {
            ?>
                <a target="_blank" href="./latest_users/latest_users.php?id=<?= $userId ?>">
                    <img src="../assets/profilePics/<?= $poster_img; ?>" height="20px" width="20px" alt="" style="border-radius: 50%;">
                    <b class="profile_name" style="color: black;">@<?= $poster ?>
                </a>
                <?php
                if ($verified == "yes") {
                ?>
                    <i class="bi bi-patch-check-fill verified"></i></b>
                <?php
                } else {
                ?>
                    <i class="verified"></i></b>
            <?php
                }
            }
            ?>
            <small id="time_ago"><?php ?></small>
            <i class="fa-solid fa-ellipsis options"></i>
        </div>
        <a target="_blank" href="../a_post/a_post.php?id=<?= $postId ?>">
            <div class="post_text">
                <br>
                <span><?= $text_post ?></span> <br><br>
                <img src="../assets/upImages/<?= $img_post ?>" alt="" style="min-width: 50%; height: auto;">
            </div>
        </a>
        <hr>
        <?php
        $data['user'] = $database->getUser($uID);
        foreach ($data['user'] as $u) {
            $profileImg = $u['profile_pic'];
            $userId3 = $u['id'];
            $commenter = $u['username'];
            $verified = $u['verified'];
        ?>
            <a target="_blank" href="../a_post/a_post.php?id=<?= $postId ?>#commentBox">
                <div class="comment_box">
                    <form action="" method="post" class="commentForm">
                        <img src="../assets/profilePics/<?= $profileImg ?>" style="border-radius: 50%; border: 3px solid white;" height="25px" width="25px" class="account" />
                        <input type="text" id="comment" placeholder="Write a comment" name="comment" style="cursor: pointer;" disabled>
                    </form>
                </div>
            </a>
        <?php
        }
        ?>
        <hr>
        
        <?php

        $database = new Database;
        $numOfComments = $database->getNumOfComments($postId);
        if($numOfComments == 0){
            $numOfComments = "";
        }
        $liked = $database->likes($postId);
        if($liked == 0){
            $liked = "";
        }
        $check_liked = $database->check_liked($postId, $_SESSION['id']);


        foreach ($data['user'] as $u) {
            $profileImg = $u['profile_pic'];
            $user2 = $u['username'];
            $userId2 = $u['id'];
            $verified = $u['verified'];
        }
        ?>
        <div class="react">
            <form action="" method="post">
                
                <?php
                if ($check_liked == 0) {
                ?>
                    <button class="like" onClick="like()"
                        type="button"
                        postId="<?= $postId ?>" user_img="<?= $_SESSION['profile_pic'] ?>" 
                        user_img2="<?=$poster_img?>" user_id="<?= $uID ?>" 
                        user_id2="<?= $uID ?>" liker="<?= $_SESSION['username'] ?>" 
                        poster="<?= $poster ?>" verified="<?= $verified ?>"
                        style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                            border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                        <b class="no_of_likes" style="color: #1877F2; font-size: 18px;" ><?= $liked ?> </b>
                        <i class="fa-regular fa-heart" 
                            style="cursor: pointer; font-size: 20px;">
                        </i>
                    </button>&nbsp;
                <?php
                } elseif ($check_liked == 1) {
                ?>
                    <button class="like" onClick="like()"
                        type="button"
                        postId="<?= $postId ?>" user_img="<?= $_SESSION['profile_pic'] ?>" 
                        user_img2="<?=$poster_img?>" user_id="<?= $uID ?>" 
                        user_id2="<?= $uID ?>" liker="<?= $_SESSION['username'] ?>" 
                        poster="<?= $poster ?>" verified="<?= $verified ?>"
                        style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                            border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                        <b class="no_of_likes" style="color: #1877F2; font-size: 18px;"><?= $liked ?> </b>
                        <i class="fa-solid fa-heart" 
                            style="cursor: pointer; font-size: 20px;">
                        </i>
                    </button>&nbsp;
                <?php
                }
                ?>
                <a target="_blank" href="../a_post/a_post.php?id=<?= $postId ?>#commentBox">
                    <button class="comments" 
                    type="button"
                        style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                            border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                        <b style="color: #1877F2; font-size: 18px;"><?= $numOfComments ?> </b>
                        <i class="fa-regular fa-comment" id="comment" style="cursor: pointer; font-size: 20px;"></i>
                    </button></a>
            </form>
        </div>
    </div>
    
    <hr>
    <?php
        }
    }else{
        exit("reachedMax");
    }
}
?>
<script>

</script>
