<?php
    include "../../backend/class.php";
    
    if(!isset($_SESSION['id'])){
        header("location: ../../signin/");
    }
    $database = new Database;
    $id = $_GET['id'];
    $data['aPage'] = $database -> getAPage($id);
    foreach($data['aPage'] as $p){
        $page_name = $p['page_name'];
        $cover_photo = $p['page_cover_photo'];
        $page_type = $p['page_type'];
        $page_description = $p['page_description'];
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
    <title>Gobook-Pages</title>
</head>
<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-4" style="margin-top: .6rem;">
                    <i class="bi bi-arrow-left-short" onclick="history.go(-1)" style="font-size: 35px; "></i>
                </div>
                <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../../../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>   
                </div>
                <div class="col-4 mt-3">
            
                </div>
            </div>
        </center>
    </div>
    <br><br><br>
        <div class="container gp_container">
            <div class="gp_lhs">
                <div class="mychat cs_active_friends">
                    <h5>PAGES YOU FOLLOW</h5><hr>
                    <div class="chats_layout">
                        <div class="chatter" style="background-image: url(../../assets/images/vibes_with_xander.jpg); height: 45px; width: 45px;">
                        </div>
                        <div class="chat">
                            <b>VIBES WITH XANDER</b><br>
                            <span>14 new ad(s)</span>
                        </div>
                    </div>
                    <hr>
                    <div class="chats_layout">
                        <div class="chatter" style="background-image: url(../../assets/images/nifes.png); height: 45px; width: 45px;">   
                        </div>
                        <div class="chat">
                            <b>NIFES</b><br>
                            <span>1 new ad(s)</span>
                        </div>
                    </div>
                    <hr>
                    <div class="chats_layout">
                        <div class="chatter" style="background-image: url(../../assets/images/groups.jpg); height: 45px; width: 45px;">
                        </div>
                        <div class="chat">
                            <b>LOVE FOR CHILDREN</b><br>
                            <span>32 new ad(s)</span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="gp_rhs">
                <div class="gp_ac_container">
                        <?php
                            $database = new Database;
                            $id = $_GET['id'];
                            $data['aPage'] = $database -> getAPage($id);
                            foreach($data['aPage'] as $p){
                                $page_name = $p['page_name'];
                                $cover_photo = $p['page_cover_photo'];
                                $page_type = $p['page_type'];
                                $page_description = $p['page_description'];
                                $page_username = $p['username'];
                                $page_link = $p['page_link'];
                                $whatsapp = $p['whatsapp'];
                                $email = $p['email'];
                                $phone = $p['phone'];
                                $date = $p['datetime'];
                            }
                        ?>
                    <div class="gp_img" style="background-image: url(../../assets/page_cover_photos/<?=$cover_photo?>);"></div>
                    <br>
                    <div class="gp_details">
                        <div class="gp_name">
                            <h4><?=$page_name?></h4>
                            <span class="bio"><?=$page_description?></span><br>
                            <?php
                            
                            foreach($data['user'] as $u){
                                $profileImg = $u['profile_pic'];
                                $user = $u['username'];
                                $user_id = $u['id'];
                                $verified = $u['verified'];
                            }
                            $data['check_page_followed'] = $database -> check_page_followed($id, $user_id);
                            if($data['check_page_followed'] == 0){
                            ?>
                            <button 
                                class="follow_btn"
                                page_id = "<?=$id?>"
                                follower_id = "<?=$user_id?>"
                                follower_username = "<?=$user?>"
                                follower_img = "<?=$profileImg?>"
                                verified = "<?=$verified?>"
                            >Follow <i class="bi bi-person-fill-add"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                                }elseif($data['check_page_followed'] == 1){
                            ?>
                            <button>Followed <i class="bi bi-check-lg"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                                }
                            ?>
                            <!-- <a href="../../chats/group_chats/grp_chat_sec/"><button>Group Chat <i class="bi bi-chat-dots-fill"></i></button></a> -->
                        </div>
                        <hr>
                        <div class="gp_about">
                          <?php 
                            $data['page_followers'] = $database -> get_page_followers($id);
                            $data['page_posts_numbers'] = $database -> get_page_post_numbers($id);
                         ?>
                        <span id="gp_no_members"><?=$data['page_followers'];?> Follower(s) .</span> <span id="gp_no_posts"><?=$data['page_posts_numbers'];?> Post(s)</span><br>
                        <span class=""><i class="bi bi-calendar"></i> <?php echo date("l, jS \of F, Y", strtotime($date))?></span> <br> <span><i class="bi bi-person-fill"></i> @<?=$page_username?></span><br>                        </div>
                    </div>
                </div>
                <br>
                <?php if(empty($page_link) && empty($phone) && empty($whatsapp) && empty($email)){ ?>
                <div></div>
                <?php }else { ?>
                <h4>Contact Details</h4>
                <div class="gp_contact">
                    <?php if(!empty($page_link)){ ?>
                        <b><a style="word-wrap: break-word;" href="<?=$page_link?>"><?=$page_link?>&nbsp;&nbsp;<i class="bi bi-box-arrow-up-right"></i></a></b><br><hr>
                    <?php }?>
                    <?php if(!empty($phone)){ ?>
                        <b><i class="bi bi-telephone"></i>&nbsp;&nbsp;<a href="tel: <?=$phone?>" style="color: black;"><?=$phone?></a></b><br>
                    <?php }?>
                    <?php if(!empty($email)){ ?>
                        <b><i class="bi bi-envelope"></i>&nbsp;&nbsp;<a href="mailto: <?=$email?>" style="color: black;"><?=$email?></a></b><br>
                    <?php }?>
                    <?php if(!empty($whatsapp)){ ?>
                        <b><i class="bi bi-whatsapp"></i>&nbsp;&nbsp;<a href="https://wa.me/+234<?=$whatsapp?>" style="color: black;">Whatsapp me(<?=$whatsapp?>)</a></b>
                    <?php }?>
                </div>
                <br><br> 
                <?php } ?>
                <div class="gp_posts">
                    <h3>Posts</h3>
                    <?php
                        $data['page_posts'] = $database -> get_page_posts($id);
                        foreach($data['page_posts'] as $pp){
                            $page_text = $pp['page_text'];
                            $page_name = $pp['page_name'];
                            $page_pr_pic = $pp['page_pr_pic'];
                            $page_photo = $pp['page_photo'];
                            
                    ?>
                        <div class="post">
                            <div class="profile">
                                <img src="../../../assets/page_cover_photos/<?=$page_pr_pic?>" style="border-radius: 50%;" height="20px" width="20px" alt="">
                                <b><?=$page_name?></b>
                                <i class="fa-solid fa-ellipsis options"></i>
                                <hr>
                                <span><?=$page_text?></span>
                                <!--<small> . 12hrs ago</small>-->
                            </div>
                            <div class="post_text">
                                <img src="../../../assets/page_cover_photos/<?=$page_photo?>" width="100%" height="auto">
                                 
                            </div>
                            <hr>
                            <div class="react">
                                <!--<small class="likes"><b>15 </b><i class="fa-solid fa-thumbs-up"></i></small>&nbsp;-->
                                <!--<small class="dislikes"><b>2 </b><i class="fa-regular fa-thumbs-down"></i></small>&nbsp;-->
                                <!--<small class="comments"><b>34 </b><i class="fa-regular fa-comment"></i></small>-->
                            </div>
                        </div>
                        <hr>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    <br><br><br><br>
    <footer>
        <div class="footer">
            
        </div>
    </footer>
    <script>
        $(".follow_btn").click(function(){
               $(this).html("Following...")
               
               let page_id = $(this).attr("page_id")
               let follower_id = $(this).attr("follower_id")
               let follower_username = $(this).attr("follower_username")
               let follower_img = $(this).attr("follower_img")
               let verified = $(this).attr("verified")
               
               $.ajax({
                   url: "../../backend/class.php",
                   dataType: "json",
                   type: "POST",
                   data: {
                       page_id: page_id,
                       follower_id: follower_id,
                       follower_username: follower_username,
                       follower_img: follower_img,
                       verified: verified
                   },
                   success: function(response){
                       if(response.stat == "followed"){
                           window.location.reload()
                       }
                   }
               })
           })
    </script>
</body>
</html>