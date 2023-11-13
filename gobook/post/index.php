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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Gobook-Post</title>
</head>
<body>
    <div class="head_nav">
        <center>
            <div class="row hheader">
                <div class="col-4 mt-3">
                    <?php
                        foreach($data['user'] as $u){
                            $profileImg = $u['profile_pic'];
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
                 <div class="nav-item active">
                     <a href="../post/"><i class="bi bi-plus-square-fill"></i></a>&nbsp;
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

            <div class="container post_container">
                <h4>Create Post <i class="fa-solid fa-edit"></i></h4>
                <div class="p_post">
                    <form action="" enctype="multipart/form-data" id="myform" method="post">

                        <div class="set_post">
                            <input type="radio" name="public" value="yes" id="public" checked><label for="">Public</label>&nbsp;&nbsp;
                            <input type="radio" name="public" value="no" id="public"><label for="">Private</label>
                            
                        </div>
                        <hr>
                        <div class="pp_post">
                            <div class="p_create_post">
                                <?php
                                    foreach($data['user'] as $u){
                                        $profileImg = $u['profile_pic'];
                                ?>
                                    <img src="../assets/profilePics/<?=$profileImg ?>" style="border-radius: 50%;" height="30px" width="30px" class="account"/>

                                <?php
                                    }
                                ?>    
                                <?php
                                    foreach($data['user'] as $user){
                                        $username = $user['username'];
                                        $poster_img = $user['profile_pic'];
                                        $verified = $user['verified'];
                                   
                                ?>
                                    <span>@<?= $username; ?></span>
                                    <input type="hidden" name="user_id" id="user_id" value="<?= $uID; ?>">
                                    <input type="hidden" name="poster" id="poster" value="<?= $username; ?>">
                                    <input type="hidden" name="poster_img" id="poster_img" value="<?= $poster_img; ?>">
                                    <input type="hidden" name="verified" id="verified" value="<?= $verified; ?>">
                                <?php
                                     }
                                ?>
                                <textarea placeholder="What's popping" name="text_post" id="text_post"></textarea>
                                <label for="img_post"><span class="postPic" style="cursor: pointer;">Add image <i class="bi bi-image"></i></span></label>
                                <input type="file" name="img_post" id="img_post" style="display: none;" accept="image/*">                                
                            </div>
                        </div>
                        <hr>
                        <input type="checkbox" name="anonymous" id="anonymous" value="yes">&nbsp;<label for="">Post as anonymous</label><br>
                        <div class="post_btn">
                            <button type="submit" id="post">Post <i class="bi bi-plus-circle"></i></button>
                        </div>
                    </form>
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
                        <a href="../post/"><i class="bi bi-plus-square-fill"></i></a>
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
<!-- <script src="../assets/js/ajax.jquery.js"></script> -->
<script>
function filePreview(input){
    if(input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#myform + img').remove();
            $('#myform').after('<br><br><img src="'+e.target.result+'"width="100%" height="auto"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#img_post").change(function(){
    filePreview(this);
})

    $('#post').on('click', ()=>{

        
        // let user_id = $("#user_id").val()
        // let poster = $("#poster").val()
        // let text_post = $("#text_post").val()
        // let public = $("#public").val()
        // let img_post = $("#img_post").val()
        // let anonymous = $("#anonymous").val()

        // console.log(img_post)

        $('#post').html("Posting...")
        // $.ajax({

        //     url: "../backend/class.php",
        //     type: "post",
        //     dataType: "json",
        //     data: {
        //         user_id: user_id,
        //         poster: poster,
        //         text_post: text_post,
        //         public: public,
        //         img_post: img_post,
        //         anonymous: anonymous
        //     },
        //     contentType: false,
        //     processData: false,
        //     success: (response)=>{
        //         if(response.stat == "posted"){
        //             console.log("Posted")
        //             $('#post').html("Posted")
        //             window.location = response.header;
        //         }
        //     }
        // })
    })
</script>
</html>