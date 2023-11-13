<?php
include "../../backend/class.php";

if (!isset($_SESSION['id'])) {
    header("location: ../../signin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1877F2">
    <link rel="shortcut icon" href="../assets/images/Gobook logo/favico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Gobook-Advertisements</title>
</head>

<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-4 mt-3">
                    <?php
                    foreach ($data['user'] as $u) {
                        $profileImg = $u['profile_pic'];
                        $user = $u['username'];
                        $user_id = $u['id'];
                        $verified = $u['verified'];
                    ?>
                        <a href="../../account/"><img src="../../assets/profilePics/<?= $profileImg ?>" style="border-radius: 50%; border: 3px solid white;" height="35px" width="35px" class="account" /></a>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>
                </div>
                <div class="col-4 mt-3">
                    <a href="../../chats/"><i class="bi bi-chat-dots" style="font-size: 25px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../../search"><i class="bi bi-search" style="font-size: 25px;"></i></a>
                </div>
            </div>
        </center>
    </div>>
    <br><br><br>
    <div class="container-fluid main-body">
        <div class="lhs">
            <div class="nav">
                <div class="nav-item">
                    <a href="../../home/"><i class="bi bi-house"></i></a>&nbsp;
                    <span>Home</span>
                </div>
                <div class="nav-item">
                    <a href="../../discover/"><i class="bi bi-people"></i></a>&nbsp;
                    <span>Discover</span>
                </div>
                <div class="nav-item">
                    <a href="../../post/"><i class="bi bi-plus-square"></i></a>&nbsp;
                    <span>Post</span>
                </div>
                <div class="nav-item active">
                    <a href="../../pages/"><i class="bi bi-flag-fill"></i></a>&nbsp;
                    <span>Pages</span>
                </div>
                <div class="nav-item">
                    <a href="../../notificatons/"><i class="bi bi-bell"></i></a>&nbsp;
                    <span>Notificatons</span>
                </div>
            </div>
        </div>
        <div class="rhs">

            <div class="container page_container">
                <h3>PAGES <i class="bi bi-flag-fill"></i></h3><br>
                <div class="differ_btns p_differ_btns">
                    <a href="../"><button class="">Pages</button></a><a href="./"><button class="active">Posts</button></a><a href="../my_pages/"><button class="">My Pages</button></a>
                </div>
                <br>
                <div class="ad_body">
                    <!--<h5 style="color: #1877F2;">This feature would be available soon</h5>-->
                    <?php
                    $database = new Database;
                    foreach ($data['pages_followed'] as $fid) {
                        $page_followed_id = $fid['page_id'];
                        $data['all_page_posts'] = $database->get_page_posts($fid['page_id']);

                        foreach ($data['all_page_posts'] as $pp) {
                            $page_post_id = $pp['id'];
                            $page_id = $pp['page_id'];
                            $page_text = $pp['page_text'];
                            $page_name = $pp['page_name'];
                            $page_pr_pic = $pp['page_pr_pic'];
                            $page_photo = $pp['page_photo'];


                    ?>

                            <div>
                                
                                <div class="post">
                                    
                                    <a href="../pages_page/?id=<?=$page_id?>"><img src="../../assets/page_cover_photos/<?= $page_pr_pic ?>" style="border-radius: 5px; border: 2px solid rgb(24, 119, 242)" height="25px" width="25px" alt=""> <b style="color: black;"><?= $page_name ?></b></a>
                                    <!--<small>12 hrs ago</small>-->
                                    <!--<i class="fa-solid fa-xmark options"></i>-->
                                    <i class="fa-solid fa-ellipsis options" style="float: right;"></i>&nbsp;&nbsp;
                                    <!--<button class="page_follow">Follow<i class="bi bi-plus"></i></button>-->
                                    <hr>
                                    <a href="./a_post.php?id=<?=$page_post_id?>"><p style="color: black;"><?= $page_text ?></p></a>
                                    <img src="../../assets/page_cover_photos/<?= $page_photo ?>" width="100%" height="auto">
                                    <hr>
                                    <div class="react">
                                        <?php
                                        $database = new Database;
                                        $check_liked = $database->page_post_likes($page_post_id, $uID, "like");
                                        $num_of_likes = $database->num_of_page_post_likes($page_post_id, "like");
                                        $data['num_of_comments'] = $database -> numOf_page_post_comments($page_post_id);
                                        if ($num_of_likes == 0) {
                                            $num_of_likes = "";
                                        }
                                        if($data['num_of_comments'] == 0){
                                            $data['num_of_comments'] = "";
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
                                        <a href="./a_post.php?id=<?=$page_post_id?>">
                                        <button class="comments" type="button" style="cursor: pointer; font-size: 14px; border: none;  margin-right: .5rem;
                                                    border-radius: 20px; padding: .2rem .5rem; outline: none;">
                                            
                                            <b style="color: #1877F2; font-size: 15px;"><?=$data['num_of_comments']?> </b>
                                            <i class="fa-regular fa-comment" id="comment" style="cursor: pointer; font-size: 20px; color: #1877F2;"></i>
                                        </button>
                                        </a>

                                    </div>
                                </div>
                                <hr>
                            </div>
                        <?php
                        }
                    }

                    if ($database->if_followed_any_page($uID) == 0) { ?>
                        <h5 style="color: #1877F2;">Follow pages to see posts </h5><a href="../">Pages</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <footer>
        <div class="footer">
            <center>
                <div class="row">
                    <div class="col">
                        <a href="../../home/"><i class="bi bi-house"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../discover/"><i class="bi bi-people"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../post/"><i class="bi bi-plus-square"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../pages/"><i class="bi bi-flag-fill"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../notificatons/"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </footer>
    <script>
        $(document).ready(function() {
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