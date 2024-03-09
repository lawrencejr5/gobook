<?php
include "../../backend/class.php";
if (!isset($_SESSION['id'])) {
    header("location: ../../signin/");
}
$id = $_GET['id'];
foreach ($data['user'] as $u) {
    $profileImg = $u['profile_pic'];
    $user = $u['username'];
    $user_id = $u['id'];
    $verified = $u['verified'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1877F2">
    <link rel="shortcut icon" href="../../assets/images/Gobook logo/favico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
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
                    <h3 class="logo"><img src="../../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>
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
                    $data['get_a_page_post'] = $database->get_a_page_post($id);
                    foreach ($data['get_a_page_post'] as $p) {
                        $page_post_id = $p['id'];
                        $page_id = $p['page_id'];

                    ?>
                        <div class="post">
                            <div class="profile">

                                <a href="../pages_page/?id=<?=$p['page_id']?>">
                                    <img src="../../assets/page_cover_photos/<?= $p['page_pr_pic'] ?>" height="20px" width="20px" alt="" style="border-radius: 50%;">
                                    <b class="profile_name" style="color: black;">@<?= $p['page_name'] ?>
                                </a>


                                <small id="time_ago"></small>
                                <i class="fa-solid fa-ellipsis options"></i>
                            </div>
                            <hr>
                            <div class="post_text">
                                <span><?= $p['page_text'] ?></span> <br><br>
                                <img src="../../assets/page_cover_photos/<?= $p['page_photo'] ?>" alt="" id="img_post" style="min-width: 50%; height: auto;">
                            </div>
                            <hr>

                            <div class="comment_box">

                                <form id="comment_form">
                                    <img src="../../assets/profilePics/<?=$profileImg?>" style="border-radius: 50%; border: 3px solid white;" height="25px" width="25px" class="account" />
                                    <input type="hidden" id="commenter_id" value="<?=$uID?>">
                                    <input type="hidden" id="page_id" value="<?= $p['page_id'] ?>">
                                    <input type="hidden" id="post_id" value="<?=$id?>">
                                    <input type="text" placeholder="Write a comment" id="comment" autofocus="on" autocomplete="off">
                                    <i class="bi bi-send-fill" style="color: rgb(24, 119, 242)" id="comment_btn"></i>
                                </form>
                            </div>

                            <hr>

                            <div class="react">
                                <?php
                                $database = new Database;
                                $check_liked = $database->page_post_likes($id, $uID, "like");
                                $num_of_likes = $database->num_of_page_post_likes($id, "like");
                                $data['num_of_comments'] = $database -> numOf_page_post_comments($page_post_id);
                                if($data['num_of_comments'] == 0){
                                    $data['num_of_comments'] = "";
                                }
                                if ($num_of_likes == 0) {
                                    $num_of_likes = "";
                                }
                                if ($check_liked == 0) {
                                ?>
                                <button class="like" type="button" post_id="<?= $page_post_id ?>" liker_id="<?= $uID ?>" page_id="<?= $page_id ?>" like_type="like" style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                                        border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                                    <b class="no_of_likes" style="color: #1877F2; font-size: 15px;"><?= $num_of_likes ?> </b>
                                    <i class="fa-regular fa-thumbs-up" style="cursor: pointer; font-size: 20px; color: #1877F2;">
                                    </i>
                                </button>
                                <?php
                                } elseif ($check_liked == 1) {
                                ?>
                                <button class="like" type="button" post_id="<?= $page_post_id ?>" liker_id="<?= $uID ?>" page_id="<?= $page_id ?>" like_type="like" style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                                        border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                                    <b class="no_of_likes" style="color: #1877F2; font-size: 15px;"><?= $num_of_likes ?> </b>
                                    <i class="fa-solid fa-thumbs-up" style="cursor: pointer; font-size: 20px; color: #1877F2;">
                                    </i>
                                </button>
                                <?php
                                }
                                ?>
                                <button class="comments" type="button" style="cursor: pointer; font-size: 14px; border: none;  margin-right: .5rem;
                                        border-radius: 20px; padding: .2rem .5rem; outline: none;">
                                    
                                    <b style="color: #1877F2; font-size: 15px;"><?php $data['num_of_comments'] ?>  </b>
                                    <i class="fa-regular fa-comment" id="comment" style="cursor: pointer; font-size: 20px; color: #1877F2;"></i>
                                </button>

                            </div>
                        </div>
                        <hr>

                    <?php
                    }
                    ?>


                    <br>
                    <div class="reactions">
                        <div class="reactions_btns">
                            <button class="show_comments active">Comments()</button>
                            <!--<button class="show_likes">Likes()</button>-->
                        </div>
                        <div class="all_comments">
                            <?php
                                $data['page_post_comments'] = $database -> get_page_post_comments($id);
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
                                            <span style="font-weight: 400;"><?= $comment ?></span>
                                        </div>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="all_likes">


                            <!--<div class="likes_layout">-->
                            <!--    <div class="liker">-->
                            <!--        <img src="../../assets/profilePics/" alt="" width="20px" height="20px">-->
                            <!--    </div>-->
                            <!--    <div class="like">-->
                            <!--        <b class="liker_name">@-->

                            <!--            <i class='bi bi-patch-check-fill verified' style='color: rgb(24, 119, 242);'></i></b>-->

                            <!--        <i class="fa-solid fa-thumbs-up" style="color: rgb(24, 119, 242);"></i></b><br>-->
                            <!--    </div>-->
                            <!--</div>-->

                        </div>

                    </div>
                </div>
                <div class="trending">
                    <h3>Trends In Gouni</h3>
                    <hr>
                    <hr>
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
                        <a href="../../home/"><i class="bi bi-house-fill"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../discover/"><i class="bi bi-people"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../post/"><i class="bi bi-plus-square"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../pages/"><i class="bi bi-flag"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../notificatons/"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </footer>
    <script>
        $(document).ready(() => {
            $("#comment_btn").on("click", function(){
                let commenter_id = $("#commenter_id").val()
                let post_id = $("#post_id").val()
                let page_id = $("#page_id").val()
                let comment = $.trim($("#comment").val())
                
                if(comment.length == 0){
                    window.alert("You cannot comment an empty comment")
                }else{
                    $.ajax({
                        url: "../../back_action/comment_page_post.php",
                        type: "POST",
                        // dataType: "json",
                        data: {
                            commenter_id: commenter_id,
                            comment: comment,
                            page_id: page_id,
                            post_id: post_id
                        },
                        success: function(response){
                            $(".all_comments").html(response)
                            // $(".show_comments").html(`Comments(${response.num_of_comments})`)
                            $("#comment_form").each(function(){
                                this.reset()
                            })
                            $("html, body").animate({
                                scrollTop: $("#img_post").height()
                            }, 500);  
                        }
                    })
                }
            })
            $(".like").click(function() {
                let post_id = $(this).attr("post_id")
                let liker_id = $(this).attr("liker_id")
                let page_id = $(this).attr("page_id")
                let like_type = $(this).attr("like_type")
                let that = this;
                
                if ($(this).children(".fa-thumbs-up").hasClass("fa-regular")) {
                    $(this).children(".fa-thumbs-up").removeClass("fa-regular").addClass("fa-solid")
                } else if ($(this).children(".fa-thumbs-up").hasClass("fa-solid")) {
                    $(this).children(".fa-thumbs-up").removeClass("fa-solid").addClass("fa-regular")
                }

                $.ajax({
                    url: "../../back_action/like_page_post.php",
                    type: "POST",
                    datatype: "json",
                    data: {
                        post_id: post_id,
                        liker_id: liker_id,
                        page_id: page_id,
                        like_type: like_type
                    },
                    success: function(response) {
                        if (response == 0) {
                            response = ""
                        }
                        $(that).children(".no_of_likes").html(response)
                        console.log(response)
                    }
                })
            })

        })
    </script>

</body>

</html>