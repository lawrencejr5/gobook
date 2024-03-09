<?php
    include "../../backend/class.php";
    
    if(!isset($_SESSION['id'])){
        header("location: ../../signin/");
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
    <title>Gobook-My Pages</title>
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
                    <a href="../../account/"><img src="../../assets/profilePics/<?=$profileImg ?>" style="border-radius: 50%; border: 3px solid white;" height="35px" width="35px" class="account"/></a>
                    <?php
                        }
                    ?>                </div>
                <div class="col-4 mt-3">
                    <h3 class="logo"><img src="../../assets/images/Gobook logo/logo.jpg" alt="" height="35px" style="border: 1px solid white"></h3>  
                </div>
                <div class="col-4 mt-3">
                    <a href="../../chats/"><i class="bi bi-chat-dots" style="font-size: 25px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../../search"><i class="bi bi-search" style="font-size: 25px;"></i></a>
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
                 <div class="nav-item active">
                     <a href="../../pages/"><i class="bi bi-flag-fill"></i></a>&nbsp;
                     <span>Pages</span>
                 </div>
                 <div class="nav-item">
                     <a href="../../notificatons/"><i class="bi bi-bell"></i></a>&nbsp;
                     <span>Notificatons</span>
                 </div>
            </div>
         </div>
         <div class="rhs">

             <div class="container page_container">
                 <h3>PAGES <i class="bi bi-flag-fill"></i></h3><br>
                 <div class="differ_btns p_differ_btns">
                     <a href="../"><button class="">Pages</button></a><a href="../advertisements/"><button class="">Posts</button></a><a href="./"><button class="active">My Pages</button></a>
                 </div>
                 <br>
                 <div class="my_page_header">
                     <h3>Your Page(s):</h3>
                 </div>
                 <div class="pages">
                     <?php
                        foreach($data['Mypages'] as $mp){
                            $id = $mp['id'];
                            $page_name = $mp['page_name'];
                            $cover_photo = $mp['page_cover_photo'];
                            $page_type = $mp['page_type'];
                    ?>
                     <div class="page_layout">
                         <div class="page_profile_img" style="background-image: url(../../assets/page_cover_photos/<?=$cover_photo?>)"></div>
                         <div class="page_details">
                             <span class="page_name"><?=$page_name?></span><br>
                            <?php 
                                $database = new Database;
                                $data['page_followers'] = $database -> get_page_followers($id);
                            ?>
                                 <span class="page_no_followers"><?=$data['page_followers'];?> Follower(s)</span> .. 
                             <small class="page_type"><?=$page_type?></small><br>
                         </div>
                         <div class="page_follow">
                             <a href="./manage_page/?id=<?=$id?>"><button>Manage</button></a>
                         </div>
                     </div>
                     <hr>
                      <?php
                        }
                     ?>
                 </div>
             </div>
        </div>
    </div>
    <div class="myModal">
        <div class="modalContainer">
            <i class="bi bi-x-lg close-modal"></i>
            <h5>Create New Page <i class="bi bi-flag-fill"></i></h5>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="page_user_id" id="page_user_id" value="<?=$uID?>">
                <input type="hidden" name="page_username" id="page_username" value="<?=$user?>">
                <input type="hidden" name="page_pr_pic" id="page_pr_pic" value="<?=$profileImg?>">
               <div class="inp_grp">
                    <i class="bi bi-image"></i>
                    <input type="file" name="page_cover_photo" accept=".jpg, .jpeg, .png, .webp, .gif">
               </div>
               <div class="inp_grp">
                    <i class="bi bi-flag-fill"></i>
                    <input type="text" name="page_name" id="page_name" placeholder="Page Name">
               </div>
               <div class="inp_grp">
                    <i class="bi bi-list"></i>
                    <select name="page_type" id="page_type">
                        <option value="">Page Type...</option>
                        <option value="Blog/Vlog">Blog/Vlog</option>
                        <option value="Tech">Tech</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="IT">IT</option>
                        <option value="Podcast">Podcast</option>
                        <option value="Gospel">Gospel</option>
                        <option value="Personal">Personal</option>
                        <option value="Web Dev">Web Dev</option>
                        <option value="Programming">Programming</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Beauty">Beauty</option>
                        <option value="Education">Education</option>
                        <option value="Camera">Camera</option>
                        <option value="Music">Music</option>
                        <option value="Eatery">Eatery</option>
                    </select>
               </div>
               <div class="inp_grp">
                    <i class="bi bi-bookmark-fill"></i>
                    <input type="text" name="page_description" id="page_description" placeholder="Page Description">
               </div>
               <h5>Page Contact Details <i class="bi bi-phone-fill"></i></h5>
               <div class="inp_grp">
                    <i class="bi bi-telephone"></i>
                    <input type="number" name="page_phone" id="page_phone" placeholder="Phone Number(Optional)">
               </div>
               <div class="inp_grp">
                    <i class="bi bi-whatsapp"></i>
                    <input type="number" name="page_whatsapp" id="page_whatsapp" placeholder="Whatsapp Number(Optional)">
               </div>
               <div class="inp_grp">
                    <i class="bi bi-envelope"></i>
                    <input type="text" name="page_email" id="page_email" placeholder="Email(Optional)">
               </div>
               <div class="inp_grp">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <input type="url" name="page_link" id="page_link" placeholder="Website Link or Important Link(Optional)">
               </div>
               <button type="submit" name="create_page">Create</button>
           </form>
        </div>
    </div>
    <i class="bi bi-plus-circle-fill createModal" style="font-size: 50px;"></i>
    <br><br><br><br>
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
                        <a href="../../pages/"><i class="bi bi-flag-fill"></i></a>
                    </div>
                    <div class="col">
                        <a href="../../notificatons/"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </center>
        </div>
    </footer>
    <script>
        $(document).ready(()=>{
           $(".createModal").on("click", ()=>{
               $(".myModal").fadeIn()
           })
           $(".close-modal").on("click", ()=>{
               $(".myModal").fadeOut(200)
           })
       })
   </script>
</body>
</html>