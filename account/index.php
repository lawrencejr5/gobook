<?php
include "../backend/class.php";
if (!isset($_SESSION['secret'])) {
    header("location: ../signin");
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
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gobook-Your Account</title>
</head>

<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-4" style="margin-top: .6rem;">
                    <i onclick="history.go(-1)" class="bi bi-arrow-left-short" style="font-size: 35px; cursor: pointer; "></i>
                </div>
                <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>
                </div>
                <div class="col-4 mt-3">

                </div>
            </div>
        </center>
    </div>
    <br><br><br>
    <div class="container-fluid main-body">
        <div class="lhs">
            <div class="nav">
                <div class="nav-item">
                    <a href="../home/"><i class="bi bi-house"></i></a>&nbsp;
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

            <div class="container acc_container">
                <?php
                foreach ($data['user'] as $u) {
                    $user_id = $u['id'];
                    $username = $u['username'];
                    $fullname = $u['fullname'];
                    $bio = $u['bio'];
                    if ($bio == "") {
                        $bio = "Hi there, I'm Using Gobook";
                    }
                    $email = $u['email'];
                    $set = $u['school_set'];
                    $regno = $u['reg_no'];
                    $faculty = $u['faculty'];
                    $department = $u['department'];
                    $dateCreated = $u['datetime'];
                    $dob = $u['dob'];
                    $gender = $u['gender'];
                    $phone = $u['phone'];
                    $profileImg = $u['profile_pic'];
                    $state = $u['state'];
                    $sec_sch = $u['sec_sch'];
                    $verified = $u['verified'];

                ?>
                    <h3>@<?= $username ?></h3>
                    <div class="ac_container">
                        <div class="ac_img">
                            <img src="../assets/profilePics/<?= $profileImg ?>" alt="">
                        </div>
                        <br><br>
                        <hr>
                        <div class="details">

                            <div class="ac_name">
                                <h4 style="text-transform: capitalize;"><?= $fullname ?>
                                    <?php
                                    if ($verified == "yes") {
                                    ?>
                                        <i class="bi bi-patch-check-fill verified" style="color: rgb(24,119,242);"></i></b>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="verified"></i></b>
                                    <?php
                                    }
                                    ?>
                                </h4>

                                <span>@<?= $username ?></span>
                                <a href="../logout.php"><button style="float: right;"><i class="bi bi-power"></i></button></a>
                            </div>
                            <hr>
                            <div class="about">
                                <span class="bio"><?= $bio ?></span><br><br>
                                <span class="dept"><i class="bi bi-book-half"></i> <?= $department ?></span><br>
                                <span class="website"><i class="bi bi-gender-ambiguous"></i> <?= $gender; ?></span><br>
                                <?php
                                if ($email == "") {

                                ?>
                                    <span class="phone"><i class="bi bi-telephone-fill"></i> <?= $phone ?></span><br>
                                <?php
                                } else {
                                ?>
                                    <span class="phone"><i class="bi bi-envelope"></i> <?= $email ?></span><br>
                                <?php
                                }
                                ?>
                                <span class="phone"><i class="bi bi-balloon-fill"></i> <?php echo date("l, jS \of F", strtotime($dob)) ?></span><br>
                                <a href="./about/" style="color: rgb(24, 119, 242); font-weight: 600; float: right;">See more...</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br><br>
                <div class="ac_myFriends">
                    <h4>Your Friends(<?= $data['numOfFriends'] ?>)</h4>

                    <div class="honline" style="height: 130px;">
                        <div class="honlinecontent">
                            <?php
                            foreach ($data['myFriends'] as $f) {
                                $fusername = $f['username'];
                                $fusername2 = $f['username2'];
                                $fpr_pic = $f['profile_pic'];
                                $fpr_pic2 = $f['profile_pic2'];

                                if ($username == $fusername) {
                                    $fusername = $f['username2'];
                                    $fpr_pic = $f['profile_pic2'];
                                } elseif ($username == $fusername2) {
                                    $fusername = $f['username'];
                                    $fpr_pic = $f['profile_pic'];
                                }

                            ?>
                                <div class="honlinelayout">
                                    <img src="../assets/profilePics/<?= $fpr_pic ?>" style="border-radius: 50%;" height="45px" width="45px" class="account" />
                                    <br>
                                    <small><?= $fusername ?></small>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <a href="../discover/friends/" style="color: rgb(24, 119, 242); font-weight: 600; float: right;">See all friends...</a>
                    </div>
                </div>
                <br><br>
                <div class="ac_my_post">
                    <h4>Your Posts</h4>
                    <?php

                    foreach ($data['Myposts'] as $d) {
                        $post_id = $d['id'];
                        $poster = $d['poster'];
                        $datetime = $d['datetime'];
                        $text_post = $d['text_post'];
                        $img_post = $d['img_post'];
                        $verified = $d['verified'];
                        $poster_img = $d['poster_img'];
                    ?>
                        <div class="post">
                            <div class="profile">
                                <img src="../assets/profilePics/<?= $poster_img; ?>" height="20px" width="20px" alt="" style="border-radius: 50%;">
                                <b class="profile_name">@<?= $poster ?>
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
                            ?>
                            <small id="time_ago"><?php ?></small>
                            <i class="fa-solid fa-ellipsis options"></i>
                            </div>
                            <a href="../a_post/?id=<?= $post_id ?>">
                                <div class="post_text">
                                    <span><?= $text_post ?></span> <br><br>
                                    <img src="../assets/upImages/<?= $img_post ?>" alt="" style="min-width: 50%; height: auto;">
                                </div>
                            </a>
                            <hr>
                            <div class="react">
                                <form action="" method="post">

                                    <?php
                                    $numOfComments = $database->getNumOfComments($post_id);
                                    if ($numOfComments == 0) {
                                        $numOfComments = "";
                                    }
                                    $liked = $database->likes($post_id);
                                    if ($liked == 0) {
                                        $liked = "";
                                    }
                                    $check_liked = $database->check_liked($post_id, $user_id);
                                    foreach ($data['user'] as $u) {
                                        $profileImg = $u['profile_pic'];
                                        $user = $u['username'];
                                        $userId = $u['id'];
                                        $verified = $u['verified'];
                                    }
                                    if ($check_liked == 0) {
                                    ?>
                                        <button class="like" type="button" postId="<?= $post_id ?>" user_img="<?= $profileImg ?>" user_img2="<?= $poster_img ?>" user_id="<?= $user_id ?>" user_id2="<?= $user_id ?>" liker="<?= $user ?>" poster="<?= $poster ?>" verified="<?= $verified ?>" style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                                                    border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                                            <b class="no_of_likes" style="color: #1877F2; font-size: 18px;"><?= $liked ?> </b>
                                            <i class="fa-regular fa-heart" style="cursor: pointer; font-size: 20px;">
                                            </i>
                                        </button>&nbsp;
                                    <?php
                                    } elseif ($check_liked == 1) {
                                    ?>
                                        <button class="like" type="button" postId="<?= $post_id ?>" user_img="<?= $profileImg ?>" user_img2="<?= $poster_img ?>" user_id="<?= $user_id ?>" user_id2="<?= $user_id ?>" liker="<?= $user ?>" poster="<?= $poster ?>" verified="<?= $verified ?>" style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
                                                    border-radius: 20px; margin-right: 1rem; padding: .2rem .9rem; outline: none;">
                                            <b class="no_of_likes" style="color: #1877F2; font-size: 18px;"><?= $liked ?> </b>
                                            <i class="fa-solid fa-heart" style="cursor: pointer; font-size: 20px;">
                                            </i>
                                        </button>&nbsp;
                                    <?php
                                    }
                                    ?>
                                    <a href="../a_post/?id=<?= $post_id ?>#commentBox">
                                        <button class="comments" type="button" style="cursor: pointer; font-size: 14px; border: none;  margin-right: 1rem;
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
                </div>
            
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
                        <a href="../home/"><i class="bi bi-house"></i></a>
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
        $(document).ready(() => {
            $(".like").click(function() {
                let postId = $(this).attr("postId")
                let liker = $(this).attr("liker")
                let poster = $(this).attr("poster")
                let userImg = $(this).attr("user_img")
                let userImg2 = $(this).attr("user_img2")
                let userId = $(this).attr("user_id")
                let userId2 = $(this).attr("user_id2")
                let verified = $(this).attr("verified")

                if ($(this).children(".fa-heart").hasClass("fa-solid")) {
                    $(this).children(".fa-heart").removeClass("fa-solid").addClass("fa-regular")
                } else if ($(this).children(".fa-heart").hasClass("fa-regular")) {
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
                    },
                    success: (r) => {
                        if (r == 0) {
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