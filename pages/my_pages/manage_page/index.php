<?php
    include "../../../backend/class.php";
    
    if(!isset($_SESSION['id'])){
        header("location: ../../../signin/");
    }
    
    $database = new Database;
    $myPageId = $_GET['id'];
    $data['getApage'] = $database -> getAPage($myPageId);
    
    foreach($data['getApage'] as $ap){
        $page_name = $ap['page_name'];
        $page_cover_photo = $ap['page_cover_photo'];
        $page_description = $ap['page_description'];
        $page_type = $ap['page_type'];
        $username = $ap['username'];
        $page_link = $ap['page_link'];
        $whatsapp = $ap['whatsapp'];
        $phone = $ap['phone'];
        $email = $ap['email'];
        $verified = $ap['verified'];
        $datetime = $ap['datetime'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1877F2">
    <link rel="shortcut icon" href="../../../assets/images/Gobook logo/favico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Gobook-Home</title>
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
                    <h5>YOUR PAGES</h5><hr>
                    <div class="chats_layout">
                        <div class="chatter" style="background-image: url(../../../assets/images/dell.webp); height: 45px; width: 45px;">
                        </div>
                        <div class="chat">
                            <b>Lawjun-E</b><br>
                            <span>14 new ad(s)</span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="gp_rhs">
                <div class="gp_ac_container">
                    <div class="gp_img" style="background-image: url(../../../assets/page_cover_photos/<?=$page_cover_photo?>);">
                        <button class="createModa">Edit page details <i class="bi bi-pencil-square"></i></button>
                    </div>
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
                                $data['check_page_followed'] = $database -> check_page_followed($myPageId, $user_id);
                                if($data['check_page_followed'] == 0){
                            ?>
                            <button class="follow_btn"
                                
                                page_id = "<?=$myPageId?>"
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
                            <button id="create_post">Post <i class="bi bi-plus-circle-fill"></i></button>
                        </div>
                        <hr>
                        <div class="gp_about">
                            <?php 
                                $data['page_followers'] = $database -> get_page_followers($myPageId);
                                $data['page_posts_numbers'] = $database -> get_page_post_numbers($myPageId);
                             ?>
                            <span id="gp_no_members"><?=$data['page_followers'];?> Follower(s) .</span> <span id="gp_no_posts"><?=$data['page_posts_numbers'];?> Post(s)</span><br>
                            <span class=""><i class="bi bi-calendar"></i> <?php echo date("l, jS \of F, Y", strtotime($datetime))?></span> <br> <span><i class="bi bi-person-fill"></i> @<?=$username?></span><br>
                        </div>
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
                    <h3>Your Posts on <?=$page_name?></h3><hr>
                    <?php
                        $data['page_posts'] = $database -> get_page_posts($myPageId);
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
                                <!--<small> . 12hrs ago</small>-->
                                <i class="fa-solid fa-ellipsis options"></i>
                                <hr>
                            </div>
                            <div class="post_text">
                                <span><?=$page_text?></span>
                                <img src="../../../assets/page_cover_photos/<?=$page_photo?>" width="100%" height="auto">
                                 
                            </div>
                            <hr>
                            <div class="react">
                                <?php
                                $database = new Database;
                                $check_liked = $database->page_post_likes($myPageId, $_SESSION['id'], "like");
                                $num_of_likes = $database->num_of_page_post_likes($myPageId, "like");
                                $data['num_of_comments'] = $database -> numOf_page_post_comments($myPageId);
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
                    <?php
                        }
                    ?>
                    
                    
                </div>
            </div>
        </div>
        <div class="myModal edit_page_modal">
            <div class="modalContainer">
                <i class="bi bi-x-lg close-modal"></i>
                <h5>Create New Page <i class="bi bi-flag-fill"></i></h5>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="page_id" value="<?=$myPageId?>">
                   <div class="inp_grp">
                        <i class="bi bi-flag-fill"></i>
                        <input type="text" name="page_name" value="<?=$page_name?>" id="page_name" placeholder="Page Name">
                   </div>
                   <div class="inp_grp">
                        <i class="bi bi-list"></i>
                        <select name="page_type" id="page_type">
                            <option value="<?=$page_type?>"><?=$page_type?></option>
                            <option value="Blog/Vlog">Blog/Vlog</option>
                            <option value="Tech">Tech</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="IT">IT</option>
                            <option value="Podcast">Podcast</option>
                            <option value="Gospel">Gospel</option>
                            <option value="Personal">Personal</option>
                            <option value="Web Dev">Web Dev</option>
                            <option value="Programming">Programming</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Education">Education</option>
                            <option value="Camera">Camera</option>
                            <option value="Music">Music</option>
                            <option value="Eatery">Eatery</option>
                        </select>
                   </div>
                   <div class="inp_grp">
                        <i class="bi bi-bookmark-fill"></i>
                        <input type="text" name="page_description" value="<?=$page_description?>" id="page_description" placeholder="Page Description">
                   </div>
                   <h5>Page Contact Details <i class="bi bi-phone-fill"></i></h5>
                   <div class="inp_grp">
                        <i class="bi bi-telephone"></i>
                        <input type="number" name="page_phone" value="<?=$phone?>" id="page_phone" placeholder="Phone Number(Optional)">
                   </div>
                   <div class="inp_grp">
                        <i class="bi bi-whatsapp"></i>
                        <input type="number" name="page_whatsapp" value="<?=$whatsapp?>" id="page_whatsapp" placeholder="Whatsapp Number(Optional)">
                   </div>
                   <div class="inp_grp">
                        <i class="bi bi-envelope"></i>
                        <input type="text" name="page_email" value="<?=$email?>" id="page_email" placeholder="Email(Optional)">
                   </div>
                   <div class="inp_grp">
                        <i class="bi bi-box-arrow-up-right"></i>
                        <input type="url" name="page_link" id="page_link" value="<?=$page_link?>" placeholder="Website Link or Important Link(Optional)">
                   </div>
                   <button type="submit" id="update_page" name="update_page">Update Page</button>
               </form>
            </div>
        </div>
        <div class="myModal postModal">
            <div class="modalContainer">
                <i class="bi bi-x-lg close-modal"></i>
                <h5>Create New Post <i class="bi bi-plus-circle-fill"></i></h5>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="page_id" value="<?=$myPageId?>">
                    <input type="hidden" name="page_name" value="<?=$page_name?>">
                    <input type="hidden" name="page_pr_pic" value="<?=$page_cover_photo?>">
                   <div class="inp_grp">
                        <i class="bi bi-image-fill"></i>
                        <input type="file" name="page_photo" value="" id="page_photo">
                   </div>
                   <div class="inp_grp" style="height: 200px; display: flex; align-items: flex-start;">
                        <i class="bi bi-pencil-square"></i>
                        <textarea name="page_text" value=""
                        style="height: 195px; width: 95%; margin-left: .5rem; border: none; outline: none;"
                        id="page_text" placeholder="Text to post"></textarea>
                   </div>
                   
                   
                   <button type="submit" name="page_post">Post</button>
               </form>
            </div>
        </div>
    <br><br><br><br>
    <footer>
        <div class="footer">
            
        </div>
    </footer>
    <script>
        $(".createModa").on("click", ()=>{
           $(".edit_page_modal").fadeIn()
       })
       $(".close-modal").on("click", ()=>{
           $(".myModal").fadeOut(200)
       })
        $("#create_post").click(function(){
            $(".postModal").fadeIn()
        })
        $(".follow_btn").click(function(){
               $(this).html("Following...")
               
               let page_id = $(this).attr("page_id")
               let follower_id = $(this).attr("follower_id")
               let follower_username = $(this).attr("follower_username")
               let follower_img = $(this).attr("follower_img")
               let verified = $(this).attr("verified")
               
               $.ajax({
                   url: "../../../backend/class.php",
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