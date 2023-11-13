<?php
include "../../../backend/class.php";
if(!isset($_SESSION['secret'])){
    header("location: ../../../signin");
}
    $id = $_GET['id'];
    $database = new Database;
    $data['a_user'] = $database -> getUser($id);
    foreach($data['a_user'] as $u){
        $username = $u['username'];
        $fullname = $u['fullname'];
        $bio = $u['bio'];
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
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gobook-Your Account</title>
</head>
<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-3" style="margin-top: .7rem;">
                    <i class="bi bi-arrow-left-short" onclick="history.go(-1)" style="font-size: 35px; "></i>
                </div>
                <div class="col-7 mt-4">
                    <h3 class="logo" style="font-size: 18px;"><?=$fullname?></h3>   
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
                 <div class="nav-item">
                     <a href="../../../home/"><i class="bi bi-house"></i></a>&nbsp;
                     <span>Home</span>
                 </div>
                 <div class="nav-item">
                     <a href="../../../discover/"><i class="bi bi-people"></i></a>&nbsp;
                     <span>Discover</span>
                 </div>
                 <div class="nav-item">
                     <a href="../../../post/"><i class="bi bi-plus-square"></i></a>&nbsp;
                     <span>Post</span>
                 </div>
                 <div class="nav-item">
                     <a href="../../../pages/"><i class="bi bi-flag"></i></a>&nbsp;
                     <span>Pages</span>
                 </div>
                 <div class="nav-item">
                     <a href="../../../notificatons/"><i class="bi bi-bell"></i></a>&nbsp;
                     <span>Notificatons</span>
                 </div>
            </div>
         </div>
         <div class="rhs">

            <div class="container about_container">
                
                <h3>About <?=$username?></h3>
                <div class="about_layout">
                    <center>
                        <div class="about_profile">
                            <img src="../../../assets/profilePics/<?=$profileImg?>" alt=""><br>
                            <b><?=$fullname?></b><br>
                            <span>@<?=$username?></span>
                        </div>
                    </center>
                    <div class="container">
                        <div class="about_details">
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                 
                                    
                                    <div class="about_detail">
                                        <b>Department</b><br>
                                        <span><?=$department?></span>
                                    </div>
                                    <div class="about_detail">
                                        <b>Gender</b><br>
                                        <span><?=$gender?></span>
                                    </div>
                                    <div class="about_detail">
                                        <b>DOB</b><br>
                                        <span><?php echo date("l, jS \of F", strtotime($dob))?></span>
                                    </div>
                                    <div class="about_detail">
                                        <b>Phone:</b><br>
                                        <span><?=$phone?></span>
                                    </div>
                                    <div class="about_detail">
                                        <b>Email:</b><br>
                                        <span><?=$email?></span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="about_detail">
                                        <b>Bio:</b><br>
                                        <span><?=$bio?></span>
                                    </div>
                                    <div class="about_detail">
                                        <b>Secondary School:</b><br>
                                        <span><?=$sec_sch?></span>
                                    </div>
                                    <div class="about_detail">
                                        <b>State of Orgin:</b><br>
                                        <span><?=$state?></span>
                                    </div>
                                    <div class="about_detail">
                                        <b>Hostel:</b><br>
                                        <span><?=$hostel?></span>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
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
                        <a href="../../../home/"><i class="bi bi-house"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../../discover/"><i class="bi bi-people"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../../post/"><i class="bi bi-plus-square"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../../pages/"><i class="bi bi-flag"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../../notificatons/"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </footer>
</body>
</html>