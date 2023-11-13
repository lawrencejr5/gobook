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
    <!-- <script src="../assets/js/jquery-3.6.1.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Gobook-Home</title>
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
                        <a href="../account/"><img src="../assets/profilePics/<?= $profileImg ?>" style="border-radius: 50%; border: 3px solid white;" height="35px" width="35px" class="account" /></a>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>
                </div>
                <div class="col-4 mt-3" 6>
                    <a href="../chats/"><i class="bi bi-chat-dots" style="font-size: 25px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../search"><i class="bi bi-search" style="font-size: 25px;"></i></a>
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
                <div class="nav-item">
                    <a href="../logout.php"><i class="bi bi-power"></i></a>&nbsp;
                    <span>Logout</span>
                </div>
            </div>
        </div>

        <div class="rhs">

            <div class="container">
                <div class="honline">
                    <h3>Latest Users <i class="fa-solid fa-earth-africa"></i></h3>
                    <hr>
                    <div class="honlinecontent">
                        <?php
                        foreach ($data['userss'] as $us) {
                            $id = $us['id'];
                            $username = $us['username'];
                            $fullname = $us['fullname'];
                            $profileImg = $us['profile_pic'];
                            $dept = $us['department'];

                        ?>
                            <div class="honlinelayout">
                                <a href="./latest_users/?id=<?= $id ?>"><img src="../assets/profilePics/<?= $profileImg ?>" style="border-radius: 50%;" height="45px" width="45px" class="account" /></a>
                                <br>
                                <small><?= $username ?></small>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
            <br>
            <div class="container h_post">
                <a href="../post/">
                    <div class="add_post">
                        <h6>Create Post <i class="fa-solid fa-edit"></i></h6>
                        <textarea name="" placeholder="What's popping" disabled></textarea>
                    </div>
                </a>
            </div>
            <br>
            <div class="container" id="body">

                <div class="mainbody">
                    <h4 style="color: rgb(24, 119, 242); background-color: white; box-shadow: 1px 1px 5px rgb(201, 198, 198); padding: .6rem; width: 300px;">Latests Posts</h4>

                    <div class="posts">


                    </div>
                    <!--<span style="font-size: 20px; font-weight: 600; text-align: center;" class="getting"></span>-->
                    <button class="getData" style="font-weight: 600; box-shadow: 1px 1px 8px grey; border-radius: 5px; background: rgb(24, 119, 242); width: 100%; padding: .3rem 0; color: white; border: none; outline: none; " onClick="getData()">Get older posts</button>
                </div>
                <div class="trending">
                    <h3 style=" font-weight: 700;">Wetin they happen?</h3>
                    <hr>
                    <hr>
                    <div class="trendings">
                        <b>Ability Test</b>
                        <p>61 posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>@vitalis</b>
                        <p>42 posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>#computerpresentation</b>
                        <p>54 posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>@vc</b>
                        <p>12 posts</p>
                    </div>
                    <hr>
                    <div class="trendings">
                        <b>#election</b>
                        <p>27 posts</p>
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

</body>
<!-- <script src="../assets/js/jquery-3.6.1.js"></script> -->
<script>
    
    const getDataBtn = document.querySelector(".getData")
    getDataBtn.addEventListener("click", () => {
        getDataBtn.textContent = "Getting..."
        setTimeout(() => {
            getDataBtn.textContent = "Get Older Posts"
        }, 1500)
    })
    $(document).ready(() => {

        getData();
        
    })

    let start = 0
    let limit = 10
    let reachedMax = false;
    // const postsDiv = document.querySelector(".posts")
    function getData() {
        if (reachedMax)
            return;
        $.ajax({
            url: "../back_action/get_posts.php",
            method: "POST",
            data: {
                getData: 1,
                start: start,
                limit: limit
            },
            success: function(response) {
                if (response == "reachedMax") {
                    reachedMax = true;
                } else {
                    limit += 10
                    $(".posts").html(response)
                    
                    window.onscroll = function() {
                      var d = document.documentElement;
                      var offset = d.scrollTop + window.innerHeight + 1;
                      var height = d.offsetHeight;
                    
                      console.log('offset = ' + offset);
                      console.log('height = ' + height);
                    
                      if (offset >= height) {
                            const getDatBtn = document.querySelector(".getData")
                            getDatBtn.textContent = "Getting more..."
                            setTimeout(() => {
                                getDatBtn.textContent = "Get Older Posts"
                            }, 1500)
                            
                        getData()
                      }
                    };
                    
                    
                    
                    $(".like").click(function() {
                        let postId = $(this).attr("postId")
                        let liker = $(this).attr("liker")
                        let poster = $(this).attr("poster")
                        let userImg = $(this).attr("user_img")
                        let userImg2 = $(this).attr("user_img2")
                        let userId = $(this).attr("user_id")
                        let userId2 = $(this).attr("user_id2")
                        let verified = $(this).attr("verified")

                        if ($(this).children(".fa-heart").hasClass("fa-regular")) {
                            $(this).children(".fa-heart").removeClass("fa-regular").addClass("fa-solid")
                        } else if ($(this).children(".fa-heart").hasClass("fa-solid")) {
                            $(this).children(".fa-heart").removeClass("fa-solid").addClass("fa-regular")
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
                }

            }
        })
    }
</script>

</html>