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
    <title>Gobook-Chats</title>
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
                 <div class="nav-item">
                     <a href="../notificatons/"><i class="bi bi-bell"></i></a>&nbsp;
                     <span>Notificatons</span>
                 </div>
            </div>
         </div>
         <div class="rhs">

             <div class="container chats_container">
                 
                 <h3>CHATS <i class="bi bi-chat-dots-fill"></i></h3><br>
                 <div class="alert alert-warning">This is just a demo. The chat feature would be available soon</div>
                 <div class="honline">
                     <h3>Your Friends <i class="fa-solid fa-earth-africa"></i></h3><hr>
                     <div class="honlinecontent">
                         <?php
                            foreach ($data['myFriends'] as $f) {
                                $fusername = $f['username'];
                                $fusername2 = $f['username2'];
                                $fpr_pic = $f['profile_pic'];
                                $fpr_pic2 = $f['profile_pic2'];

                                if ($user == $fusername) {
                                    $fusername = $f['username2'];
                                    $fpr_pic = $f['profile_pic2'];
                                } elseif ($user == $fusername2) {
                                    $fusername = $f['username'];
                                    $fpr_pic = $f['profile_pic'];
                                }

                            ?>
                         <div class="honlinelayout">
                             <img src="../assets/profilePics/<?= $fpr_pic ?>" style="border-radius: 50%;" height="45px" width="45px" class="account"/>
                             <br>
                             <small><?= $fusername ?></small>
                         </div>
                         <?php
                            }
                         ?>
                     </div>
                        
                 </div>
                 <br><br>
                 
                 <div class="chats_body">
                     <div class="mychat">
                         <h3>My Chats</h3><hr><br>
                         <!--<a href="./chat_section/">-->
                         <!--    <div class="chats_layout">-->
                         <!--        <div class="chatter">-->
                         <!--            <img src="../assets/images/profileimg.jpg" style="border-radius: 50%;" height="45px" width="45px" class="account"/> -->
                         <!--        </div>-->
                         <!--        <div class="chat">-->
                         <!--            <b>@lawrencejr</b><br>-->
                         <!--            <span>Mtcheew🥱</span>-->
                         <!--        </div>-->
                         <!--        <div class="chat_nums">-->
                         <!--            <b>19:09</b><br>-->
                         <!--            <span>1</span>-->
                         <!--        </div>-->
                         <!--    </div>-->
                         <!--</a>-->
                         <!--<hr>-->
                         <!--<div class="chats_layout">-->
                         <!--    <div class="chatter">-->
                         <!--        <img src="../assets/images/aremoji11.png" style="border-radius: 50%;" height="45px" width="45px" class="account"/> -->
                         <!--    </div>-->
                         <!--    <div class="chat">-->
                         <!--        <b>@babe_21</b><br>-->
                         <!--        <span>Let's hang out today</span>-->
                         <!--    </div>-->
                         <!--    <div class="chat_nums">-->
                         <!--        <b>Yesterday</b><br>-->
                         <!--        <span>2</span>-->
                         <!--    </div>-->
                         <!--</div>-->
                         <!--<hr>-->
                         <!--<div class="chats_layout">-->
                         <!--    <div class="chatter">-->
                         <!--        <img src="../assets/images/aremoji6.png" style="border-radius: 50%;" height="45px" width="45px" class="account"/> -->
                         <!--    </div>-->
                         <!--    <div class="chat">-->
                         <!--        <b>@big_x</b><br>-->
                         <!--        <span>I've learnt sql shah</span>-->
                         <!--    </div>-->
                         <!--    <div class="chat_nums">-->
                         <!--        <b>Yesterday</b><br>-->
                         <!--        <span>1</span>-->
                         <!--    </div>-->
                         <!--</div>-->
                         <!--<hr>-->
                         <h4>Nothing here</h4>
                         <button style="background: rgb(24, 119, 242); float: right; color: white; font-weight: 600; border: none; border-radius: 4px; outline: none;">Start Chat <i class="bi bi-chat-dots"></i></button>
                        <br>
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

</body>
</html>