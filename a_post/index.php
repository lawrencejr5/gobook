<?php
include "../backend/class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1877F2">
    <link rel="shortcut icon" href="../assets/images/Gobook logo/favico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Gobook</title>
</head>
<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-3" style="margin-top: .7rem;">
                    <i onclick="history.go(-1)" class="bi bi-arrow-left-short" style="font-size: 35px; cursor: pointer; "></i>
                </div>
                <div class="col-7 mt-4">
                    <h3 class="logo"><img src="../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>    
                </div>
                <div class="col-2 mt-3">
            
                </div>
            </div>
        </center>
    </div>
    <br><br><br>
    <div class="container-fluid main-body">
        <div class="lhs">
            <div class="nav">
                 <div class="nav-item active">
                     <a href="../home/"><i class="bi bi-house-fill"></i></a>&nbsp;
                     <span>Home</span>
                 </div>
                 <div class="nav-item">
                     <a href="../discover/"><i class="bi bi-people"></i></a>&nbsp;
                     <span>Discover</span>
                 </div>
                 <div class="nav-item">
                     <a href="../post/"><i class="bi bi-plus-square"></i></a>&nbsp;
                     <span>Post</span>
                 </div>
                 <div class="nav-item">
                     <a href="../pages/"><i class="bi bi-flag"></i></a>&nbsp;
                     <span>Pages</span>
                 </div>
                 <div class="nav-item">
                     <a href="../notificatons/"><i class="bi bi-bell"></i></a>&nbsp;
                     <span>Notificatons</span>
                 </div>
            </div>
         </div>
         <div class="rhs">

            
           
            <div class="container" id="body">
                
                <div class="mainbody">
                <?php
                    $database = new Database;
                    $id = $_GET['id'];
                    $data['Apost'] = $database -> getApost($id);
                    foreach($data['Apost'] as $d){
                        $userId = $d['user_id'];
                        $postId = $d['id'];
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
                                    if($anonymous == 'yes'){
                                        echo '
                                        <img src="../assets/profilePics/user.png" height="20px" width="20px" alt="" style="border-radius: 50%;">
                                        <b class="profile_name">@anonymous</b> 
                                        ';
                                    }else{
                                ?>
                                        
                                <a href="../home/latest_users/?id=<?=$userId?>">
                                    <img src="../assets/profilePics/<?=$poster_img; ?>" height="20px" width="20px" alt="" style="border-radius: 50%;">
                                    <b class="profile_name" style="color: black;">@<?=$poster ?> 
                                </a>
                                <?php
                                    if($verified == "yes"){
                                ?>
                                    <i class="bi bi-patch-check-fill verified"></i></b>
                                <?php
                                    }else{
                                ?>
                                    <i class="verified"></i></b>
                                <?php
                                    }
                                }
                                ?>
                        <small id="time_ago"><?php ?></small>
                        <i class="fa-solid fa-ellipsis options"></i>
                    </div>
                        <div class="post_text">
                            <span><?=$text_post ?></span> <br><br>
                            <img src="../assets/upImages/<?=$img_post ?>" alt="" style="min-width: 50%; height: auto;">
                        </div>
                    <hr>
                    <?php
                        foreach($data['user'] as $u){
                            $profileImg = $u['profile_pic'];
                            $userId = $u['id'];
                            $commenter = $u['username'];
                            $verified = $u['verified'];
                    ?>
                    <div class="comment_box" id="commentBox">
                    
                        <form action="" method="post">
                            <img src="../assets/profilePics/<?=$profileImg ?>" style="border-radius: 50%; border: 3px solid white;" height="25px" width="25px" class="account"/>
                            <input type="hidden" name="user_id" id="user_id" value="<?=$userId?>">
                            <input type="hidden" name="commenter" id="commenter" value="<?=$commenter?>">
                            <input type="hidden" name="verified" id="verified" value="<?=$verified?>">
                            <input type="hidden" name="profile_img" id="profile_img" value="<?=$profileImg?>">
                            <input type="hidden" name="post_id" id="post_id" value="<?=$postId?>">
                            <input type="text" placeholder="Write a comment" name="comment" id="comment" autofocus="on" autocomplete="off">
                            <i class="bi bi-send-fill" style="color: rgb(24, 119, 242)" id="comment_btn"></i>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                    <hr>
                    <?php
                        $database = new Database;
                        $post_id = $_GET['id'];
                        $numOfComments = $database -> getNumOfComments($post_id);
                        if($numOfComments == 0){
                            $numOfComments = "";
                        }
                        $numOfLikes = $database -> getNumOfLikes($post_id);
                        if($numOfLikes == 0){
                                    $liked = "";
                                }
                        $check_liked = $database -> check_liked($post_id, $userId);
                        
                        foreach($data['user'] as $u){
                            $profileImg = $u['profile_pic'];
                            $user = $u['username'];
                            $userId = $u['id'];
                            $verified = $u['verified'];
                        }
                        ?>
                    <div class="react">
                                    <form action="" method="post">
                                        
                                        <?php
                                        if ($check_liked == 0) {
                                        ?>
                                            <button class="like"
                                                type="button"
                                                postId="<?= $post_id ?>" user_img="<?= $profileImg ?>" 
                                                user_img2="<?=$poster_img?>" user_id="<?= $userId ?>" 
                                                user_id2="<?= $user_id ?>" liker="<?= $user ?>" 
                                                poster="<?= $poster ?>" verified="<?= $verified ?>"
                                                style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                                                    border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                                                <b class="no_of_likes" style="color: #1877F2; font-size: 18px;" ><?= $numOfLikes ?> </b>
                                                <i class="fa-regular fa-heart" 
                                                    style="cursor: pointer; font-size: 20px;">
                                                </i>
                                            </button>&nbsp;
                                        <?php
                                        } elseif ($check_liked == 1) {
                                        ?>
                                            <button class="like"
                                                type="button"
                                                postId="<?= $post_id ?>" user_img="<?= $profileImg ?>" 
                                                user_img2="<?=$poster_img?>" user_id="<?= $userId ?>" 
                                                user_id2="<?= $user_id ?>" liker="<?= $user ?>" 
                                                poster="<?= $poster ?>" verified="<?= $verified ?>"
                                                style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                                                    border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                                                <b class="no_of_likes" style="color: #1877F2; font-size: 18px;"><?= $numOfLikes ?> </b>
                                                <i class="fa-solid fa-heart" 
                                                    style="cursor: pointer; font-size: 20px;">
                                                </i>
                                            </button>&nbsp;
                                        <?php
                                        }
                                        ?>
                                        <a href="">
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
                    ?>
                    <br>
                    <div class="reactions">
                        <div class="reactions_btns">
                            <button class="show_comments active">Comments(<?=$numOfComments?>)</button>
                            <button class="show_likes">Likes(<?=$numOfLikes?>)</button>
                            <!--<button class="show_dislikes">Dislikes(2)</button>-->
                        </div>
                        <div class="all_comments">
                        <?php
                        $database = new Database;
                        $post_id = $_GET['id'];
                        $data['comments'] = $database -> getComments($post_id);
                            foreach($data['comments'] as $c){
                                $comment = $c['comment'];
                                $commenter = $c['commenter'];
                                $verified = $c['verified'];
                                $user_pic = $c['user_pic'];

                        ?>

                       
                            <div class="comments_layout">
                                <div class="commenter">
                                    <img src="../assets/profilePics/<?=$user_pic?>" alt="" width="20px" height="20px">
                                </div>
                                <div class="comment">
                                    <b class="commenter_name">@<?=$commenter?>
                                    <?php
                                        if($verified == "yes"){
                                    ?>
                                    <i class='bi bi-patch-check-fill verified' style='color: rgb(24, 119, 242);'></i></b><br>
                                    <?php
                                        }
                                        else{
                                            echo "<i class='verified' style='color: rgb(24, 119, 242);'></i></b><br>";
                                        }
                                    ?>
                                    <span><?=$comment?></span>

                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="all_likes">
                            
                            <?php
                                $database = new Database;
                                $post_id = $_GET['id'];
                                $data['comments'] = $database -> getLikes($post_id);
                                    foreach($data['comments'] as $l){
                                        $user_img = $l['user_img'];
                                        $liker = $l['user'];
                                        $verified = $l['verified'];
                            ?>
                            <div class="likes_layout">
                                <div class="liker">
                                    <img src="../assets/profilePics/<?=$user_img?>" alt="" width="20px" height="20px">
                                </div>
                                <div class="like">
                                    <b class="liker_name">@<?=$liker?>
                                    <?php
                                        if($verified == "yes"){
                                    ?>
                                    <i class='bi bi-patch-check-fill verified' style='color: rgb(24, 119, 242);'></i></b>
                                    <?php
                                        }
                                        else{
                                            echo "<i class='verified' style='color: rgb(24, 119, 242);'></i></b>";
                                        }
                                    ?>
                                    <i class="fa-solid fa-thumbs-up" style="color: rgb(24, 119, 242);"></i></b><br>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                        <!--<div class="all_dislikes">-->

                        <!--    <div class="likes_layout">-->
                        <!--        <div class="liker">-->
                        <!--            <img src="../assets/images/aremoji10.png" alt="" width="20px" height="20px">-->
                        <!--        </div>-->
                        <!--        <div class="like">-->
                        <!--            <b class="liker_name">@savcyboi <i class="fa-solid fa-thumbs-down" style="color: rgb(24, 119, 242);"></i></b><br>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="likes_layout">-->
                        <!--        <div class="liker">-->
                        <!--            <img src="../assets/images/aremoji11.png" alt="" width="20px" height="20px">-->
                        <!--        </div>-->
                        <!--        <div class="like">-->
                        <!--            <b class="liker_name">@mabel <i class="fa-solid fa-thumbs-down" style="color: rgb(24, 119, 242);"></i></b><br>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="trending">
                    <h3>Trends In Gouni</h3>
                    <hr><hr>
                    <div class="trendings">
                        <b>#cristianoisthegoat</b>
                        <p>61.2k posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>#gouni</b>
                        <p>42.7k posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>#endsars</b>
                        <p>54.9k posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>#impeachbuhari</b>
                        <p>12.2k posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>#peterobi</b>
                        <p>22.2k posts</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="myModal">
        <div class="modalContainer">
            <i class="bi bi-x-lg close-modal"></i>
            <h5>Comment <i class="fa-regular fa-comment"></i></h5>
           <div class="inp_grp">
                <i class="fa-regular fa-comment"></i>
                <input type="text" placeholder="What is ur comment">
           </div>
           <button type="submit">Comment</button>
        </div>
    </div>
    <br><br><br><br>
    <footer>
        <div class="footer">
            <center>
                <div class="row">
                    <div class="col">
                        <a href="../home/"><i class="bi bi-house-fill"></i></a>
                    </div>
                    <div class="col">
                        <a href="../discover/"><i class="bi bi-people"></i></a>
                    </div>
                    <div class="col">
                        <a href="../post/"><i class="bi bi-plus-square"></i></a>
                    </div>
                    <div class="col">
                        <a href="../pages/"><i class="bi bi-flag"></i></a>
                    </div>
                    <div class="col">
                        <a href="../notificatons/"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </footer>
    <script>
        $(document).ready(()=>{
            $(".show_likes").on("click", ()=>{
                $(".all_comments").hide()
                $(".all_dislikes").hide()
                $(".all_likes").show()
                $(".show_likes").addClass("active")
                $(".show_comments").removeClass("active")
                $(".show_dislikes").removeClass("active")
            })
            $(".show_dislikes").on("click", ()=>{
                $(".all_comments").hide()
                $(".all_likes").hide()
                $(".all_dislikes").show()
                $(".show_dislikes").addClass("active")
                $(".show_comments").removeClass("active")
                $(".show_likes").removeClass("active")
            })
            $(".show_comments").on("click", ()=>{
                $(".all_likes").hide()
                $(".all_dislikes").hide()
                $(".all_comments").show()
                $(".show_dislikes").removeClass("active")
                $(".show_comments").addClass("active")
                $(".show_likes").removeClass("active")
            })

            $('#comment_btn').on('click', ()=>{
                let user_id = $("#user_id").val()
                let post_id = $("#post_id").val()
                let profile_img = $("#profile_img").val()
                let comment = $("#comment").val()
                let commenter = $("#commenter").val()
                let verified = $("#verified").val()
                $.ajax({
                    url: "../backend/class.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        user_id: user_id,
                        post_id: post_id,
                        profile_img: profile_img,
                        comment: comment,
                        commenter: commenter,
                        verified: verified
                    },
                    success: (response)=>{
                        if(response.stat == "commented"){
                            location.reload()
                        }else if(response.stat == "problem"){

                        }
                    }
                })  
            })
            $(".like").click(function() {
                let postId = $(this).attr("postId")
                let liker = $(this).attr("liker")
                let poster = $(this).attr("poster")
                let userImg = $(this).attr("user_img")
                let userImg2 = $(this).attr("user_img2")
                let userId = $(this).attr("user_id")
                let userId2 = $(this).attr("user_id2")
                let verified = $(this).attr("verified")
                
                if($(this).children(".fa-heart").hasClass("fa-solid")){
                    $(this).children(".fa-heart").removeClass("fa-solid").addClass("fa-regular")
                }else if($(this).children(".fa-heart").hasClass("fa-regular")){
                    $(this).children(".fa-heart").removeClass("fa-regular").addClass("fa-solid")
                }
                        
                $.ajax({
                    url: "../back_action/like_post.php",
                    type: "post",
                    data: {
                        postId: postId,
                        liker: liker,
                        poster: poster,
                        userId: userId,
                        userId2: userId2,
                        userImg: userImg,
                        userImg2: userImg2,
                        verified: verified
                    }, success: (r)=>{
                        if(r == 0){
                            r = ""
                        }
                        $(this).children(".no_of_likes").html(`${r} `)
                        
                        
                    }   
                })
            })
        })
    </script>
 
</body>
</html>