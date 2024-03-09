<?php

include "../../backend/class.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>Gobook</title>
        <style>
            body{
                background-color: whitesmoke;
            }
        </style>
</head>
<body>
    <div class="head_nav" style="background-color: rgb(24, 118, 242);">
        <center>
            <div class="row hheader">
                <div class="col-4 mt-3">
                    </div>
                    <div class="col-4 mt-3">
                    <h3 class="logo">Gobook</h3>   
                </div>
                <div class="col-4 mt-3">
                    
                    </div>
            </div>
        </center>
    </div>
    <div class="container-fluid gb_container">
        <div class="gb_login_container">
            <div class="gb_login_body">
                <h4>Choose Profile Picture</h4>
                <center>
                <div class="profilePics">
                    <img src="../../assets/profilePics/aremoji1.jpg" height="100px" class="selImg1" width="100px" width="100px" alt="" id="aremoji1.jpg">
                    <img src="../../assets/profilePics/aremoji2.jpg" height="100px" class="selImg2" width="100px" width="100px" alt="" id="aremoji2.jpg">
                    <img src="../../assets/profilePics/aremoji3.jpg" height="100px" class="selImg3" width="100px" width="100px" alt="" id="aremoji3.jpg">
                    <img src="../../assets/profilePics/aremoji4.jpg" height="100px" class="selImg4" width="100px" width="100px" alt="" id="aremoji4.jpg">
                    <img src="../../assets/profilePics/aremoji5.jpg" height="100px" class="selImg5" width="100px" width="100px" alt="" id="aremoji5.jpg">
                    <img src="../../assets/profilePics/aremoji6.jpg" height="100px" class="selImg6" width="100px" width="100px" alt="" id="aremoji6.jpg">
                    <img src="../../assets/profilePics/aremoji7.jpg" height="100px" class="selImg7" width="100px" width="100px" alt="" id="aremoji7.jpg">
                    <img src="../../assets/profilePics/aremoji8.jpg" height="100px" class="selImg8" width="100px" width="100px" alt="" id="aremoji8.jpg">
                </div>
                <form action="" method="post">
                    <input type="text" value="" id="myval" name="profile_pic">
                    <input type="hidden" value="<?=$_SESSION['info']['username']?>" id="" name="username">
                    <input type="hidden" value="<?=$_SESSION['info']['fullname']?>" id="" name="fullname">
                    <input type="hidden" value="<?=$_SESSION['info']['regno']?>" id="" name="regno">
                    <input type="hidden" value="<?=$_SESSION['info']['password']?>" id="" name="password">
                    <input type="hidden" value="<?=$_SESSION['info']['dob']?>" id="" name="dob">
                    <input type="hidden" value="<?=$_SESSION['info']['phone']?>" id="" name="phone">
                    <input type="hidden" value="<?=$_SESSION['info']['gender']?>" id="" name="gender">
                
                </center>
                <div class="gb_btn_layout">
                        <button type="submit" id="signup2" name="compSignup">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<!-- <script src="../../assets/js/ajax.jquery.js"></script> -->

<script>
    $(document).ready(()=>{
        $(".selImg1").on("click", ()=>{
            $("#myval").val($(".selImg1").attr("id"))
        })
        $(".selImg2").on("click", ()=>{
            $("#myval").val($(".selImg2").attr("id")) 
        })
        $(".selImg3").on("click", ()=>{
            $("#myval").val($(".selImg3").attr("id")) 
        })
        $(".selImg4").on("click", ()=>{
            $("#myval").val($(".selImg4").attr("id")) 
        })
        $(".selImg5").on("click", ()=>{
            $("#myval").val($(".selImg5").attr("id")) 
        })
        $(".selImg6").on("click", ()=>{
            $("#myval").val($(".selImg6").attr("id")) 
        })
        $(".selImg7").on("click", ()=>{
            $("#myval").val($(".selImg7").attr("id")) 
        })
        $(".selImg8").on("click", ()=>{
            $("#myval").val($(".selImg8").attr("id")) 
        })
    })
</script>

</html>