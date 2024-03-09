<?php
include "../backend/class.php";
if(!isset($_SESSION['id'])){
        header("location: ../signin/");
    }
$database = new Database;
$myPageId = $_GET['id'];
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
    <title>Gobook-Pages</title>
</head>
<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-4 mt-3">
                    <?php
                        foreach($data['user'] as $u){
                            $profileImg = $u['profile_pic'];
                            $user = $u['username'];
                            $user_id = $u['id'];
                            $verified = $u['verified'];
                    ?>
                    <a href="../account/"><img src="../assets/profilePics/<?=$profileImg ?>" style="border-radius: 50%; border: 3px solid white;" height="35px" width="35px" class="account"/></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>   
                </div>
                <div class="col-4 mt-3"6>
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
                 <div class="nav-item active">
                     <a href="../pages/"><i class="bi bi-flag-fill"></i></a>&nbsp;
                     <span>Pages</span>
                 </div>
                 <div class="nav-item">
                     <a href="../notificatons/"><i class="bi bi-bell"></i></a>&nbsp;
                     <span>Notificatons</span>
                 </div>
            </div>
         </div>
         <div class="rhs">

             <div class="container page_container">
                 <h3>PAGES <i class="bi bi-flag-fill"></i></h3><br>
                 <div class="differ_btns p_differ_btns">
                     <a href="./"><button class=" active">Pages</button></a><a href="advertisements/"><button class="">Posts</button></a><a href="my_pages/"><button class="grpp">My Pages</button></a>
                 </div>
                 <br>
                 <h3>Check out these pages</h3>
                 <br>
                 <div class="pages">
                     
                     <?php
                        foreach($data['pages'] as $p){
                            $id = $p['id'];
                            $page_name = $p['page_name'];
                            $cover_photo = $p['page_cover_photo'];
                            $page_type = $p['page_type'];
                            
                    ?>
                     <!--<a href="./pages_page/?id=<?=$id?>">-->
                         <div class="page_layout">
                            <a href="./pages_page/?id=<?=$id?>">
                            <div class="page_profile_img" style="background-image: url(../assets/page_cover_photos/<?=$cover_photo?>)"></div>
                            </a>
                             <div class="page_details">
                                 <span class="page_name"><?=$page_name?></span><br>
                                 <?php 
                                    $data['page_followers'] = $database -> get_page_followers($id);
                                 ?>
                                 <span class="page_no_followers"><?=$data['page_followers'];?> Follower(s)</span> .
                                 <small class="page_type"><?=$page_type?></small><br>
                             </div>
                             <div class="page_follow">
                                 <?php
                                    $data['check_page_followed'] = $database -> check_page_followed($id, $user_id);
                                    if($data['check_page_followed'] == 0){
                                ?>
                                <button class="follow_btn"
                                    style="outline: none;"
                                    page_id = "<?=$id?>"
                                    follower_id = "<?=$user_id?>"
                                    follower_username = "<?=$user?>"
                                    follower_img = "<?=$profileImg?>"
                                    verified = "<?=$verified?>"
                                 >Follow</button>
                                <?php
                                    }elseif($data['check_page_followed'] == 1){
                                ?>
                                <button style="outline: none; width: 100px" class="followed_btn" disabled>Followed <i class="bi bi-check2"></i></button> 
                                <?php
                                    }
                                 ?>
                                 
                                 
                             </div>
                         </div>
                     <!--</a>-->
                     <hr>
                     <?php
                        }
                     ?>
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
                        <a href="../pages/"><i class="bi bi-flag-fill"></i></a>
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
           $(".createModal").on("click", ()=>{
               $(".myModal").fadeIn()
           })
           $(".close-modal").on("click", ()=>{
               $(".myModal").fadeOut(200)
           })
           
           $(".follow_btn").click(function(){
               $(this).html("Following...")
               
               let page_id = $(this).attr("page_id")
               let follower_id = $(this).attr("follower_id")
               let follower_username = $(this).attr("follower_username")
               let follower_img = $(this).attr("follower_img")
               let verified = $(this).attr("verified")
               
               $.ajax({
                   url: "../backend/class.php",
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
       })
   </script>
</body>
</html>