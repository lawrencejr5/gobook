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
    <title>Gobook-Notifications</title>
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
                 <div class="nav-item">
                     <a href="../pages/"><i class="bi bi-flag"></i></a>&nbsp;
                     <span>Pages</span>
                 </div>
                 <div class="nav-item active">
                     <a href="../notificatons/"><i class="bi bi-bell-fill"></i></a>&nbsp;
                     <span>Notificatons</span>
                 </div>
            </div>
         </div>
         <div class="rhs">

             <div class="container notifications_container">
                 <h3>NOTIFICATIONS <i class="bi bi-bell-fill"></i></h3><br>
                 <div class="noti_body">
                     <?php
                     foreach($data['notifications'] as $n){
                         $username = $n['username'];
                         $username2 = $n['username2'];
                         $user_id = $n['user_id'];
                         $user_id2 = $n['user_id2'];
                         $profileImg = $n['profileImg'];
                         $profileImg2 = $n['profileImg2'];
                         $verified = $n['verified'];
                         $type= $n['type'];
                         $message = "";
                         switch ($type){
                            case "like":
                                $message = "liked ur post";
                                break;
                            case "send_friend_request":
                                $message = "sent u a friend request";

                         }
                         
                    ?>
                        <div class="noti_layout">
                            <div class="notifier">
                                <img src="../assets/profilePics/<?=$profileImg?>" style="border-radius: 50%;" height="45px" width="45px" class="account"/> 
                            </div>
                            <div class="notification">
                                <b> @<?=$username?></b><span> <?=$message?></span>
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
                        <a href="../notificatons/"><i class="bi bi-bell-fill"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </footer>

</body>
</html>