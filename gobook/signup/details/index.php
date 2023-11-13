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
            <center><h4>Gobook Wants to grab a few details from you</h4></center>
            <br>
            <div class="gb_login_body">
                <form action="" method="post">
                    <label for="">Date Of Birth:</label>
                    <div class="gb_login_layout">
                        <i class="bi bi-balloon-fill"></i>
                        <input type="date" name="dob" id="dob" value="<?=isset($_SESSION['info']['dob']) ? $_SESSION['info']['dob'] : "" ?>">
                    </div>
                    <label for="">Gender:</label>
                    <div class="gb_login_layout">
                        <i class="bi bi-balloon-fill"></i>
                        <select name="gender" id="gender">
                            <option value="<?=isset($_SESSION['info']['gender']) ? $_SESSION['info']['gender'] : "" ?>">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="None">Not Human</option>
                        </select>
                    </div>
                    
                    <div class="gb_btn_layout">
                        <br>
                        <button type="submit" id="signup2" name="next">Continue</button>
                    </div>
                    <br>
                    
                </form>
            </div>
        </div>
    </div>
</body>

<script src="../../assets/js/ajax.jquery.js"></script>

</html>