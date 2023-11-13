<?php
    include "../backend/class.php";
    if(!isset($_SESSION['secret'])){
        header("location: ../signin");
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
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <title>Gobook-Home</title>
    <title>Gobook-Discover Friends</title>
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
                 <div class="nav-item active">
                     <a href="../discover/"><i class="bi bi-people-fill"></i></a>&nbsp;
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
            <div class="container">
                <div class="headline">
                    <h3>Discover <i class="bi bi-people-fill"></i></h3>
                    <br>
                </div>
                
                <br>
                <div class="fri_reqs">
                    <h4>Friend Requests <i class="bi bi-person-check-fill"></i></h4>
                    
                    <div class="fri_reqs_lay">
                        <?php
                        if($data['numOfFriendRequests'] > 0){
                            foreach($data['friendRequests'] as $fq){
                                $user_id = $fq['user_id'];
                                $user_id2 = $fq['user_id2'];
                                $username = $fq['username'];
                                $fullname = $fq['fullname'];
                                $profileImg = $fq['profile_pic'];
                                $verified = $fq['verified'];
                                
                                
                        
                        ?>
                        <div class="fri_lay">
                            <center><img src="../assets/profilePics/<?=$profileImg?>" style="border-radius: 50%;"/></center>
                            <div class="d_details">
                                <h6 style="text-transform: capitalize;"><?=$fullname?>
                                <?php
                                    if($verified == "yes"){
                                ?>
                                    <i class="bi bi-patch-check-fill verified" style="color: rgb(24,119,242);"></i></b>
                                <?php
                                    }else{
                                ?>
                                    <i class="verified"></i></b>
                                <?php
                                    }
                                ?>
                            </h4>
                                </h6>
                                <span>@<?=$username?></span><br>
                            </div>
                            <form method="post">
                                <input type="hidden" name="fq_user_id" value="<?=$user_id?>">
                                <input type="hidden" name="fq_user_id2" value="<?=$user_id2?>">
                                <button type="submit" name="accept" style="background-color: green; color: white; border: none; box-shadow: 1px 1px 5px rgb(201, 198, 198); border-radius: 2px; padding: .2rem;">Yes<i class="bi bi-check"></i></button>
                                <button type="submit" name="decline" style="background-color: red; color: white; border: none; box-shadow: 1px 1px 5px rgb(201, 198, 198); border-radius: 2px; padding: .2rem;">No<i class="bi bi-x"></i></button>
                            </form>
                        </div>
                        <?php
                                }
                            }else{
                                echo "
                                    <h6 style='color: grey'>
                                        You do not have any friend requests for now
                                    </h6>
                                ";
                            }
                        ?>
                    </div>
                </div>
                <br>
                <div class="find_frns" style="">
                    <hr>
                    <h4>Connect With Other Students <i class="bi bi-search"></i></h4>
                    <?php
                        $database = new Database;
                        $data['fr_users'] = $database -> getFrUsers($uID);
                        foreach($data['fr_users'] as $us){
                            $id = $us['id'];
                            $username = $us['username'];
                            $fullname = $us['fullname'];
                            $profilepic = $us['profile_pic'];
                            $dept = $us['department'];
                            $verified = $us['verified'];
                            
                    ?>
                        <div class="find_frns_lay">
                            <img src="../assets/profilePics/<?=$profilepic?>" style="border-radius: 50%; width: 80px; height: 80px;" width="10px" height="10px"/>
                            <div class="find_frns_details">
                                <form method="post">
                                <!--<a href="./view_account/?id=<?=$id?>">-->
                                <h6 style="text-transform: capitalize; color: black;"><?=$fullname?>
                                <?php
                                    if($verified == "yes"){
                                ?>
                                    <i class="bi bi-patch-check-fill verified" style="color: rgb(24,119,242); font-size: 12px;"></i></b>
                                <?php
                                    }else{
                                ?>
                                    <i class="verified"></i></b>
                                <?php
                                    }
                                ?>
                            </h4>
                                </h6>
                                <span style="text-transform: capitalize; color: black;">@<?=$username?></span><br>
                                <span  style="text-transform: capitalize; color: black;"><i class="bi bi-book-half"></i> <?=$dept?></span><br>
                                <?php
                                    foreach($data['user'] as $u){
                                        $profileImg = $u['profile_pic'];
                                        $user = $u['username'];
                                        $fname = $u['fullname'];
                                        $user_id = $u['id'];
                                        $verified = $u['verified'];
                                    }
                                ?>
                                <input type="hidden" name="user_id2" id="user_id2" value="<?=$id?>" >
                                <input type="hidden" name="fullname2" id="fullname2" value="<?=$fullname?>" >
                                <input type="hidden" name="username2" id="username2" value="<?=$username?>" >
                                <input type="hidden" name="profileImg2" id="profileImg2" value="<?=$profilepic?>" >
                                <input type="hidden" name="user_id" id="user_id" value="<?=$user_id?>" >
                                <input type="hidden" name="fullname" id="fullname" value="<?=$fname?>" >
                                <input type="hidden" name="username" id="username" value="<?=$user?>" >
                                <input type="hidden" name="profileImg" id="profileImg" value="<?=$profileImg?>" >
                                <input type="hidden" name="verified" id="verified" value="<?=$verified?>" >
                                
                                <?php
                                    $database = new Database;
                                    $check = $database -> check_added_friend($user_id, $id);

                                    if($check == 0){
                                ?>
                                <button type="button" 
                                class="add_friend_btn"
                                style=" box-shadow: 1px 1px 5px rgb(201, 198, 198); border-radius: 2px; padding: .2rem; border: none; width: 85px; font-weight: 600;"
                                name="add_friend"
                                user_id2="<?=$id?>"
                                fullname2="<?=$fullname?>"
                                username2="<?=$username?>"
                                profileImg2="<?=$profilepic?>"
                                user_id="<?=$user_id?>"
                                fullname="<?=$fname?>"
                                username="<?=$user?>"
                                profileImg="<?=$profileImg?>"
                                verified="<?=$verified?>"
                                >Connect <i class="bi bi-person-fill-add add_friend"></i>
                                </button>
                                <?php
                                    }elseif($check == 1){
                                ?>
                                 <button type="button" style="background-color: green; color: white; border: none; box-shadow: 1px 1px 5px rgb(201, 198, 198); border-radius: 2px; padding: .2rem;width: 90px; font-weight: 600;">Connected <i class="bi bi-person-check add_friend"></i></button>
                                <?php
                                    }
                                ?>
                                <!--</a>-->
                                </form>
                            </div>
                        </div>
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
                        <a href="../discover/"><i class="bi bi-people-fill"></i></a>
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
    <script>
        $(".add_friend_btn").click(function(){
            $(this).html("Connecting...")
            
            let user_id = $(this).attr("user_id")
            let fullname = $(this).attr("fullname")
            let username = $(this).attr("username")
            let profileImg = $(this).attr("profileImg")
            let user_id2 = $(this).attr("user_id2")
            let username2 = $(this).attr("username2")
            let fullname2 = $(this).attr("fullname2")
            let profileImg2 = $(this).attr("profileImg2")
            let verified = $(this).attr("verified")
            
            $.ajax({
                url: "../backend/class.php",
                type: "POST",
                dataType: "json",
                data: {
                    af_user_id: user_id,
                    fullname: fullname,
                    username: username,
                    profileImg: profileImg,
                    user_id2: user_id2,
                    username2: username2,
                    fullname2: fullname2,
                    profileImg2: profileImg2,
                    verified: verified
                },
                success: function(response){
                    if(response.stat == "good"){
                        location.reload()
                    }
                }
            })
        })
    </script>
</body>
</html>