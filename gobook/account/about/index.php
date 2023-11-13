<?php
include "../../backend/class.php";
if(!isset($_SESSION['secret'])){
    header("location: ../../signin");
}

    foreach($data['user'] as $u){
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
    <link rel="shortcut icon" href="../assets/images/Gobook logo/favico.jpg" type="image/x-icon">
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
                <div class="col-3" style="margin-top: .7rem;">
                    <i onclick="history.go(-1)" class="bi bi-arrow-left-short" style="font-size: 35px; cursor: pointer; "></i>
                </div>
                <div class="col-7 mt-4">
                    <h3 class="logo" style="font-size: 18px; text-transform: capitalize;"><?=$fullname?></h3>   
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

            <div class="container about_container">
                
                <h3>About You</h3>
                <div class="about_layout">
                    <center>
                        <div class="about_profile">
                            <img src="../../assets/profilePics/<?=$profileImg?>" alt=""><br>
                            <b style="text-transform: capitalize;"><?=$fullname?></b> <i class="bi bi-pencil-square editAbout" style="font-size: 30px; color: rgb(24, 119, 242);"></i><br>
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
                                        <b>Set Of</b><br>
                                        <span><?=$set?></span>
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
    <div class="myModal">
        <div class="modalContainer">
            <i class="bi bi-x-lg close-modal"></i>
            <h5>Edit Your Details <i class="bi bi-person-fill"></i></h5>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="uid" id="uid" value="<?=$uID?>" required>
               
               <div class="inp_grp">
                   
                    <i class="bi bi-person-fill"></i>
                    <input type="text" name="fname" id="fname" placeholder="Full Name" value="<?=$fullname?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-at"></i>
                    <input type="text" name="uname" id="uname" placeholder="Username" value="<?=$username?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-map-fill"></i>
                    <input type="text" name="bio" id="bio" placeholder="Bio" value="<?=$bio?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-envelope-fill"></i>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?=$email?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-telephone-fill"></i>
                    <input type="text" name="phone" id="phone" placeholder="Phone" value="<?=$phone?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-calendar-fill"></i>
                    <input type="date" name="dob" id="dob" placeholder="Dob" value="<?=$dob?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-geo-alt-fill"></i>
                    <input type="text" name="state" id="state" placeholder="State Of Origin" value="<?=$state?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-book-fill"></i>
                    <input type="text" name="sec" id="sec" placeholder="Secondary School" value="<?=$sec_sch?>" required>
               </div>
               <div class="inp_grp">
                   
                    <i class="bi bi-house-fill"></i>
                    <input type="text" name="hostel" id="hostel" placeholder="Hostel" value="<?=$hostel?>" required>
               </div>
               <button type="button" id="update_account" name="editAbout">Update Details</button>
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
<script>
        $(document).ready(()=>{
           $(".editAbout").on("click", ()=>{
               $(".myModal").fadeIn()
           })
           $(".close-modal").on("click", ()=>{
               $(".myModal").fadeOut(200)
           })
           
           $("#update_account").click(()=>{
               $("#update_account").html("Updating...")
               let uid = $("#uid").val()
               let fname = $("#fname").val()
               let uname = $("#uname").val()
               let email = $("#email").val()
               let bio = $("#bio").val()
               let dob = $("#dob").val()
               let phone = $("#phone").val()
               let state = $("#state").val()
               let sec = $("#sec").val()
               let hostel = $("#hostel").val()
               
               $.ajax({
                   url: "../../backend/class.php",
                   type: "POST",
                   dataType: "json",
                   data: {
                       ua_uid: uid,
                       fname: fname,
                       uname: uname,
                       email: email,
                       bio: bio,
                       dob: dob,
                       phone: phone,
                       state: state,
                       sec: sec,
                       hostel: hostel
                   }, 
                   success: function(response){
                       if(response.stat == "updated"){
                           window.location.reload()
                       }
                   }
               })
           })
       })
   </script>
</html>