<?php
include "../../backend/class.php";
if(!isset($_SESSION['secret'])){
    header("location: ../../signin");
}

    foreach($data['user'] as $u){
        $id = $u['id'];
        $username = $u['username'];
        $fullname = $u['fullname'];
        $bio = $u['bio'];
        $email = $u['email'];
        $set = $u['school_set'];
        $regno = $u['reg_no'];
        $department = $u['department'];
        $dateCreated = $u['datetime'];
        $dob = $u['dob'];
        $gender = $u['gender'];
        $phone = $u['phone'];
        $profileImg = $u['profile_pic'];
        $state = $u['state'];
        $sec_sch = $u['sec_sch'];
        $hostel = $u['hostel'];

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
    <title>Gobook-Your Account</title>
    
    <style>
        .myModal b{
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-4" style="margin-top: .6rem;">
                    <i onclick="history.go(-1)" class="bi bi-arrow-left-short" style="font-size: 35px; cursor: pointer; "></i>
                </div>
                <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>   
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
                 <div class="nav-item">
                     <a href="../../pages/"><i class="bi bi-flag"></i></a>&nbsp;
                     <span>Pages</span>
                 </div>
                 <div class="nav-item">
                     <a href="../../notificatons/"><i class="bi bi-bell"></i></a>&nbsp;
                     <span>Notificatons</span>
                 </div>
            </div>
         </div>
         <div class="rhs">
            <div class="container myFriends_container">
                <h3>My Friends</h3>
                <?php
                    foreach($data['allMyFriends'] as $f){
                        $id = $f['user_id'];
                        $id2 = f['user_id2'];
                        $fusername = $f['username'];
                        $ffullname = $f['fullname'];
                        $ffullname2 = $f['fullname2'];
                        $fusername2 = $f['username2'];
                        $fpr_pic = $f['profile_pic'];
                        $fpr_pic2 = $f['profile_pic2'];
                        
                        if($username == $fusername){
                            $id = $f['user_id2'];
                            $fusername = $f['username2'];
                            $fpr_pic = $f['profile_pic2'];
                            $ffullname = $f['fullname2'];
                        }elseif($username == $fusername2){
                            $id = $f['user_id'];
                            $fusername = $f['username'];
                            $fpr_pic = $f['profile_pic'];
                            $ffullname = $f['fullname'];
                        }
                        
                ?>
                <a href="../view_account/?id=<?=$id?>">
                    <div class="layout">
                        <img src="../../assets/profilePics/<?=$fpr_pic?>">
                        <div class="l-layout">
                            <b><?= $ffullname; ?></b><br>
                            <span>@<?= $fusername; ?></span>
                        </div>
                    </div>
                </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div class="myModal">
        <div class="modalContainer">
            <i class="bi bi-x-lg close-modal"></i>
            <h5>Edit Your Details <i class="bi bi-person-fill"></i></h5>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="page_user_id" id="page_user_id" value="<?=$uID?>">
               
               <div class="inp_grp">
                   
                    <i class="bi bi-person-fill"></i>
                    <input type="text" name="fname" id="fname" placeholder="Full Name" value="<?=$fullname?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-at"></i>
                    <input type="text" name="uname" id="uname" placeholder="Username" value="<?=$username?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-map-fill"></i>
                    <input type="text" name="bio" id="bio" placeholder="Bio" value="<?=$bio?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-envelope-fill"></i>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?=$email?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-telephone-fill"></i>
                    <input type="text" name="phone" id="phone" placeholder="Phone" value="<?=$phone?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-calendar-fill"></i>
                    <input type="date" name="dob" id="dob" placeholder="Dob" value="<?=$dob?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-geo-alt-fill"></i>
                    <input type="text" name="page_name" id="page_name" placeholder="State Of Origin" value="<?=$state?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-book-fill"></i>
                    <input type="text" name="sec" id="sec" placeholder="Secondary School" value="<?=$sec_sch?>">
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-house-fill"></i>
                    <input type="text" name="hostel" id="hostel" placeholder="Hostel" value="<?=$hostel?>">
               </div>
               <button type="button" name="editAbout">Update Details</button>
           </form>
        </div>
    </div>
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
                        <a href="../../pages/"><i class="bi bi-flag"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../notificatons/"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </footer>
</body>

</html>