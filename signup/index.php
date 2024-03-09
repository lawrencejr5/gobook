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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>Gobook</title>
        <style>
            body{
                background-color: whitesmoke;
            }
            .contact_section, .profilepic_section, .username_section, .about_section{
                display: none;
            }
        </style>
</head>
<body>
    <div class="head_nav" style="background-color: rgb(24, 118, 242);">
        <center>
            <div class="row hheader">
                <div class="col-4 mt-3"></div>
                    <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>   
                </div>
                <div class="col-4 mt-3">
                    
                    </div>
            </div>
        </center>
    </div>
    <div class="container-fluid gb_container">
        <div class="gb_login_container">
            <div class="gb_login_body">
                <form action="" method="post" id="myform">
                    <div class="user_section">
                        <label for="">Full Name:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" placeholder="Full Name" name="fullname" id="fullname" value="" required>
                        </div>
                        <label for="">Reg Number:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-book-fill"></i>
                            <input type="text" placeholder="Input your Reg No." name="regno" id="regno" value="" required>
                        </div>
                        
                        <label for="">Gender:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-gender-ambiguous"></i>
                            <select name="gender" id="gender" required>
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Not Human">Not Human</option>
                            </select>
                        </div>
                        <label for="">Password:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-lock-fill"></i>
                            <input type="password" placeholder="Create password" name="password" id="password" value="" required>
                        </div>
                        <label for="">Confirm Password:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-lock-fill"></i>
                            <input type="password" placeholder="Confirm password" name="cpassword" id="cpassword" value="" required>
                        </div>
                        <div class="gb_btn_layout">
                            <input type="checkbox"> <span for=""> I agree to all <a href=""> terms and conditions </a></span><br><br>
                            <button type="button" id="next1" name="next">Continue</button>
                        </div>
                        <br>
                        
                    </div>
                    
                    <div class="username_section">
                        <label for="">Username:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-at"></i>
                            <input type="text" placeholder="Select username" name="username" id="username" value="" required>
                        </div>
                        <div class="gb_btn_layout">
                            <button type="button" id="prev2" name="" class="np_btn">Previous</button>
                            <button type="button" id="next2" name="" class="np_btn">Next</button>
                        </div>
                        <br>
                    </div>
                    <div class="contact_section">
                        <label for="">Phone:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-telephone-fill"></i>
                            <input type="text" placeholder="Your Phone Number" name="phone" id="phone" value="">
                        </div>
                        <label for="">Email:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="text" placeholder="Your Email" name="email" id="email" value="">
                        </div>
                        <div class="gb_btn_layout">
                            <button type="button" id="prev3" name="" class="np_btn">Previous</button>
                            <button type="button" id="next3" name="" class="np_btn">Next</button>
                        </div>
                        <br>
                    </div>
                    <div class="about_section">
                        <h6>Gobook just wants to get some information on you to be able to help you connect better.</h6>
                        <h6 style="color:rgb(24, 119, 242)">Please note that these are all optional.</h6>
                        <label for="">Date Of Birth:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-balloon-fill"></i>
                            <input type="date" name="dob" id="dob" value="" placeholder="When were you born">
                        </div>
                        <label for="">Bio:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-at"></i>
                            <input type="text" placeholder="A little self description" name="bio" id="bio" value="">
                        </div>
                        <label for="">Your hostel:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-houses-fill"></i>
                            <input type="text" placeholder="Your Hostel" name="hostel" id="hostel" value="">
                        </div>
                        <label for="">Your Secondary School:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-shop-window"></i>
                            <input type="text" placeholder="Sec School" name="sec_sch" id="sec_sch" value="">
                        </div>
                        <label for="">State of Orgin:</label>
                        <div class="gb_login_layout">
                            <i class="bi bi-geo-alt-fill"></i>
                            <input type="text" placeholder="State Of Origin" name="state" id="state" value="">
                        </div>
                        <div class="gb_btn_layout">
                            <button type="button" id="prev4" name="" class="np_btn">Previous</button>
                            <button type="button" id="next4" name="" class="np_btn">Next</button>
                        </div>
                    </div>
                    
                    <div class="profilepic_section">
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
                            <img src="../../assets/profilePics/aremoji9.jpg" height="100px" class="selImg9" width="100px" width="100px" alt="" id="aremoji9.jpg">
                            <img src="../../assets/profilePics/aremoji10.jpg" height="100px" class="selImg10" width="100px" width="100px" alt="" id="aremoji10.jpg">
                            <img src="../../assets/profilePics/aremoji11.jpg" height="100px" class="selImg11" width="100px" width="100px" alt="" id="aremoji11.jpg">
                            <img src="../../assets/profilePics/aremoji12.jpg" height="100px" class="selImg12" width="100px" width="100px" alt="" id="aremoji12.jpg">
                            <img src="../../assets/profilePics/aremoji13.jpg" height="100px" class="selImg13" width="100px" width="100px" alt="" id="aremoji13.jpg">
                            <img src="../../assets/profilePics/aremoji14.jpg" height="100px" class="selImg14" width="100px" width="100px" alt="" id="aremoji14.jpg">
                            <img src="../../assets/profilePics/aremoji15.jpg" height="100px" class="selImg15" width="100px" width="100px" alt="" id="aremoji15.jpg">
                            <div class="gb_login_layout">
                                <i class="bi bi-image"></i>
                                <input type="text" value="" id="myval" class="profilePicVal" placeholder="profilepic" name="profile_pic">
                            </div>
                        </div>
                    <div class="gb_btn_layout">
                        <button type="button" id="prev5" name="" class="np_btn">Previous</button>
                        <button type="signup" id="signup" name="signup" class="np_btn">Next</button>
                    </div>
                    </div>
                    <div class="gb_check_layout">
                        <p>Already have an account? <a href="../signin/">Signin</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

 <!--<script src="../assets/js/ajax.jquery.js"></script> -->
 
 <script>
     $(document).ready(()=>{
        //  alert("Ride On Lawrencejr, God is your strength")
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
        $(".selImg9").on("click", ()=>{
            $("#myval").val($(".selImg9").attr("id")) 
        })
        $(".selImg10").on("click", ()=>{
            $("#myval").val($(".selImg10").attr("id")) 
        })
        $(".selImg11").on("click", ()=>{
            $("#myval").val($(".selImg11").attr("id")) 
        })
        $(".selImg12").on("click", ()=>{
            $("#myval").val($(".selImg12").attr("id")) 
        })
        $(".selImg13").on("click", ()=>{
            $("#myval").val($(".selImg13").attr("id")) 
        })
        $(".selImg14").on("click", ()=>{
            $("#myval").val($(".selImg14").attr("id")) 
        })
        $(".selImg15").on("click", ()=>{
            $("#myval").val($(".selImg15").attr("id")) 
        })
        
        
        // $("#fullname").on("blur", ()=>{
        //     if($("#fullname").val().length == ""){
        //         console.log("Fullname is Empty")
        //     }
        // })
        // $("#regno").on("blur", ()=>{
        //     if($("#regno").val().length == ""){
        //         console.log("regno is Empty")
        //     }
        // })
        // $("#gender").on("blur", ()=>{
        //     if($("#gender").val().length == ""){
        //         console.log("gender is Empty")
        //     }
        // })
        // $("#password").on("blur", ()=>{
        //     if($("#password").val().length == ""){
        //         console.log("password is Empty")
        //     }
        // })
        // $("#cpassword").on("blur", ()=>{
        //     if($("#cpassword").val().length == ""){
        //         console.log("cpassword is Empty")
        //     }else if($("#cpassword") !== $("#password")){
        //         console.log("passwords do not match")
        //     }
        // })
        
        $("#prev2").on("click", ()=>{
            $(".user_section").show()
            $(".about_section").hide()
            $(".profilepic_section").hide()
            $(".contact_section").hide()
            $(".username_section").hide()
        })
        $("#prev3").on("click", ()=>{
            $(".user_section").hide()
            $(".about_section").hide()
            $(".profilepic_section").hide()
            $(".username_section").show()
            $(".contact_section").hide()
        })
        $("#prev4").on("click", ()=>{
            $(".user_section").hide()
            $(".about_section").hide()
            $(".profilepic_section").hide()
            $(".username_section").hide()
            $(".contact_section").show()
        })
        $("#prev5").on("click", ()=>{
            $(".user_section").hide()
            $(".about_section").show()
            $(".profilepic_section").hide()
            $(".username_section").hide()
            $(".contact_section").hide()
        })
        $("#next1").on("click", ()=>{
            
            if($("#fullname").val().length == ""){
                alert("Fullname is Empty")
            }else if($("#regno").val().length == ""){
                alert("gender is Empty")
            }else if($("#gender").val().length == ""){
                alert("gender is Empty")
            }else if($("#password").val().length == ""){
                alert("password is Empty")
            }else if($("#cpassword").val().length == ""){
                alert("cpassword is Empty")
            }else if($("#password").val() !== $("#cpassword").val()){
                alert("passwords do not match")
            }else{
                $(".user_section").hide()
                $(".about_section").hide()
                $(".profilepic_section").hide()
                $(".contact_section").hide()
                $(".username_section").show()
            }
            
        })
        $("#next2").on("click", ()=>{
            if($("#username").val().length == ""){
                alert("Please select a Username")
            }else{
                $(".user_section").hide()
                $(".about_section").hide()
                $(".profilepic_section").hide()
                $(".username_section").hide()
                $(".contact_section").show()
            }
        })
        $("#next3").on("click", ()=>{
            if($("#phone").val().length == "" && $("#email").val().length == ""){
                alert("Please give us Your Phone Number Or Email For Contact Purposes")
            }else{
                $(".user_section").hide()
                $(".about_section").show()
                $(".profilepic_section").hide()
                $(".username_section").hide()
                $(".contact_section").hide()
            }
        })
        $("#next4").on("click", ()=>{
            $(".user_section").hide()
            $(".about_section").hide()
            $(".profilepic_section").show()
            $(".username_section").hide()
            $(".contact_section").hide()
        })
        
     })
 </script>
 
 <script>
     
 </script>

</html>