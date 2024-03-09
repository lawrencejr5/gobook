<?php

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
</head>
<body>
    <div class="head_nav" style="background-color: rgb(24, 118, 242);">
        <center>
            <div class="row hheader">
                <div class="col-4 mt-3">
                </div>
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
                    <label for="">Reg Number/Username:</label>
                    <div class="gb_login_layout">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" placeholder="reg no/username" name="user" id="user">
                    </div>
                    <label for="">Password:</label>
                    <div class="gb_login_layout">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" placeholder="password" name="password" id="password">
                    </div>
                    <div class="gb_btn_layout">
                        <input type="checkbox"> <span for="">Remember Me </span><br><br>
                        <button type="button" name="signin" id="signin">Login</button>
                    </div>
                    <br>
                    <div class="gb_check_layout">
                        <p>Don't have an account? <a href="../signup/">Signup</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/ajax.jquery.js"></script>
</html>