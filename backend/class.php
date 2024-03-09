<?php

include "database.php";
$uID = $_SESSION['id'];


$database = new Database;

$data['user'] = $database -> getUser($uID);
$data['users'] = $database -> getUsers();
$data['husers'] = $database -> getHusers();
$data['userss'] = $database -> getUserss();
$data['posts'] = $database -> getPosts();
// $data['postss'] = $database -> getPostss();
$data['Myposts'] = $database -> getMyPosts($uID);
$data['friendRequests'] = $database -> friendRequests($uID);
$data['numOfFriendRequests'] = $database -> numOfFriendRequests($uID);
$data['pages'] = $database -> getPages();
$data['Mypages'] = $database -> getMyPages($uID);
$data['myFriends'] = $database -> myFriends($uID);
$data['allMyFriends'] = $database -> allMyFriends($uID);
$data['numOfFriends'] = $database -> numOfFriends($uID);
$data['notifications'] = $database -> myNotifications($uID);
$data['pages_followed'] = $database -> get_pages_followed($uID);

// $input = "if";
// $data['search'] = $database -> search();


// Signup

if(isset($_POST['user'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $return = [];

    $database = new Database;
    if($database -> fieldEmpty($user) == true){
        $return['stat'] = "userEmpty";
    }elseif($database -> fieldEmpty($password) == true){
        $return['stat'] = "passEmpty";
    }
    else{
        $signedin = $database->signinUser($user, $password);
        if($signedin == true){
            $return['stat'] = "good";
            $return['header'] = "../home/";
        }elseif($signedin == false){
            $return['stat'] = "noUser";
            $return['header'] = "./";
        }
    }

    echo json_encode($return);
}

if(isset($_POST['signup'])){
    $fullname = strtolower(trim($_POST['fullname']));
    $regno = strtolower($_POST['regno']);
    $divReg = explode('/', $regno);
    $department = strtolower($divReg['2']);
    $faculty = strtolower($divReg['1']);
    $school_set = strtolower($divReg['0']);
    include "set.dept.fac.php";
    $gender = $_POST['gender'];
    if($gender == ""){
        $gender = "Not Human";
    }
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = strtolower($_POST['email']);
    $dob = $_POST['dob'];
    $bio = $_POST['bio'];
    if($bio == ""){
        $bio = "Hi there, I'm Using Gobook";
    }
    $hostel = $_POST['hostel'];
    $sec_sch = $_POST['sec_sch'];
    $state = $_POST['state'];
    $profile_pic = $_POST['profile_pic'];
    if($profile_pic == ""){
        $profile_pic = "user.png";
    }
    
    $return = [];

    $database = new Database;
        $signedup = $database->signupUser($fullname, $regno, $gender, $password, $username, $phone, $email, $dob, $bio, $hostel, $sec_sch, $state, $profile_pic, $school_set, $department);
        if($signedup == true){
            // $return['stat'] = "good";
            header("location: ./welcome");
        }elseif($signedup == false){
            // $return['stat'] = "noUser";
            // $return['header'] = "./";
        }

    // echo json_encode($return);
}

if(isset($_POST['public'])){
    $user_id = $_POST['user_id'];
    $poster = $_POST['poster'];
    $poster_img = $_POST['poster_img'];
    $text_post = $_POST['text_post'];
    $public = $_POST['public'];
    $verified = $_POST['verified'];
    if(!isset($_POST['anonymous'])){
        $anonymous = "no";
    }else{
        $anonymous = $_POST['anonymous'];
    }
    $return = [];

    $img_name = $_FILES['img_post']['name'];
    $img_tmp_name = $_FILES['img_post']['tmp_name'];
    $img_size = $_FILES['img_post']['size'];
    $div_img = explode('.', $img_name);
    $img_extension = end($div_img);
    $allowed = ['jpg', 'png', 'svg', 'webp', 'jpeg', 'jfif'];
    $img_post = $div_img['0'] ."-". substr(str_shuffle("dfghnsgdfv152837bbfhdbgibewdufvdh62411vdh783it743y482y2gryhfhd"), 0, 5) . "." . $img_extension;
    $path = "../assets/upImages/". $img_post;

    if(in_array($img_extension, $allowed)){
        move_uploaded_file($img_tmp_name, $path);
    }else{
        echo "<script>alert('file not format')</script>";
    }
    
    if(empty($text_post) && empty($img_post)){
        echo "<script>alert('empty')</script>";
        // header("location: ../home");
    }
    elseif($img_size > 1000000){
        echo "<script>alert('Your image size is too big, try uploading images lower than 1mb')</script>";
    }
    else{
        $database = new Database;
        $posted = $database -> createPost($user_id, $poster, $poster_img, $text_post, $public, $img_post, $anonymous, $verified);
        
        if($posted == true){
            // $return['stat'] = "posted";
            // $return['header'] = "../home/";

            echo "<script>alert('empty')</script>";
            header("location: ../home");


        }elseif($posted == false){
            $return['stat'] = "posted";
            echo "<script>alert('empty')</script>";
        }
    }


    echo json_encode($return);
}
if(isset($_POST['comment'])){
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    $profile_img = $_POST['profile_img'];
    $comment = $_POST['comment'];
    $commenter = $_POST['commenter'];
    $verified = $_POST['verified'];
    $return = [];


    
   
    $database = new Database;
    $commented = $database -> comment($user_id, $post_id, $comment, $commenter, $profile_img, $verified);
    
    if($commented == true){
        $return['stat'] = "commented";
        $return['header'] = "../a_post?id=$post_id";
    }elseif($commented == false){
        $return['stat'] = "problem";
    }


    echo json_encode($return);
}


if(isset($_POST['af_user_id'])){
    $user_id = $_POST['af_user_id'];
    $user_id2 = $_POST['user_id2'];
    $username = $_POST['username'];
    $username2 = $_POST['username2'];
    $fullname = $_POST['fullname'];
    $fullname2 = $_POST['fullname2'];
    $profileImg = $_POST['profileImg'];
    $profileImg2 = $_POST['profileImg2'];
    $type = "send_friend_request";
    $verified = $_POST['verified'];
    $return = [];
    
    $database = new Database;
    $added = $database -> addFriend($user_id, $username, $fullname, $profileImg, $user_id2, $username2, $fullname2, $profileImg2, $verified);
    
    if($added == true){
        $return['stat'] = "good";
        $database -> createNotification($user_id, $user_id2, $username, $username2, $profileImg, $profileImg2, $verified, $type);
    }
    echo json_encode($return);
}

if(isset($_POST['add_friend'])){
    $user_id = $_POST['user_id'];
    $user_id2 = $_POST['user_id2'];
    $username = $_POST['username'];
    $username2 = $_POST['username2'];
    $fullname = $_POST['fullname'];
    $fullname2 = $_POST['fullname2'];
    $profileImg = $_POST['profileImg'];
    $profileImg2 = $_POST['profileImg2'];
    $type = "send_friend_request";
    $verified = $_POST['verified'];
    $return = [];
    
    $database = new Database;
    $added = $database -> addFriend($user_id, $username, $fullname, $profileImg, $user_id2, $username2, $fullname2, $profileImg2, $verified);
    
    if($added == true){
        // $return['stat'] = "good";
        $database -> createNotification($user_id, $user_id2, $username, $username2, $profileImg, $profileImg2, $verified, $type);
    }
    // echo json_encode($return);
}

if(isset($_POST['accept'])){
    $user_id = $_POST['fq_user_id'];
    $user_id2 = $_POST['fq_user_id2'];
    
    $database = new Database;
    $accepted = $database -> accept_friend_request($user_id, $user_id2);
    if($accepted == true){
        header("location: ./");
    }
}

if(isset($_POST['decline'])){
    $user_id = $_POST['fq_user_id'];
    $user_id2 = $_POST['fq_user_id2'];
    
    $database = new Database;
    $declined = $database -> decline_friend_request($user_id, $user_id2);
    
    if($declined == true){
        header("location: ./");
    }
}

if(isset($_POST['create_page'])){
    $page_user_id = $_POST['page_user_id'];
    $page_name = $_POST['page_name'];
    $page_type = $_POST['page_type'];
    $page_description = $_POST['page_description'];
    
    $page_phone = $_POST['page_phone'];
    $page_email = $_POST['page_email'];
    $page_whatsapp = $_POST['page_whatsapp'];
    $page_username = $_POST['page_username'];
    $page_pr_pic = $_POST['page_pr_pic'];
    $page_link = $_POST['page_link'];
    if(empty($page_link)){
        $page_link = "Not Provided";
    }else if (!filter_var($page_link, FILTER_VALIDATE_URL)) {
        echo "<script>alert('invalid url!!')</script>";
    }
    
    $image = $_FILES['page_cover_photo']['name'];
    $tmp_name = $_FILES['page_cover_photo']['tmp_name'];
    $size = $_FILES['page_cover_photo']['size'];
    $expImg = explode(".", $image);
    $extension = end($expImg);
    $allowed = ['jpg', 'jpeg', 'jfif', 'png', 'jfif', 'webp'];
    $page_cover_photo = str_replace([' ', '(', ')'], "", $expImg['0']) ."-". substr(str_shuffle("dfghnsgdfv152837bbfhdbgibewdufvdh62411vdh783it743y482y2gryhfhd"), 0, 5) . "." . $extension;
    $path = "../../assets/page_cover_photos/".$page_cover_photo;
    
    if(in_array($extension, $allowed)){
        move_uploaded_file($tmp_name, $path);
    }else{
        echo "<script>alert('file not format')</script>";
    }
    
    if(empty($page_name)){
        echo "<script>alert('empty')</script>";
        // header("location: ../home");
    }elseif($size > 1000000){
        echo "<script>alert('Your image size is too big, try uploading images lower than 1mb')</script>";
    }
    else{
        $database = new Database;
        $created = $database -> create_page($page_user_id, $page_name, $page_type, $page_description, $page_cover_photo, $page_pr_pic, $page_username, $page_whatsapp, $page_phone, $page_email, $page_link);
        
        if($created == true){
            header("location: ./");
        }
    }
}
if(isset($_POST['page_post'])){
    $page_id = $_POST['page_id'];
    $page_name = $_POST['page_name'];
    $page_pr_pic = $_POST['page_pr_pic'];
    $page_text = $_POST['page_text'];
    
    $image = $_FILES['page_photo']['name'];
    $tmp_name = $_FILES['page_photo']['tmp_name'];
    $size = $_FILES['page_photo']['size'];
    $expImg = explode(".", $image);
    $extension = end($expImg);
    $allowed = ['jpg', 'jpeg', 'jfif', 'png', 'jfif', 'webp'];
    $page_photo = str_replace([' ', '(', ')'], "", $expImg['0']) ."-". substr(str_shuffle("dfghnsgdfv152837bbfhdbgibewdufvdh62411vdh783it743y482y2gryhfhd"), 0, 5) . "." . $extension;
    $path = "../../../assets/page_cover_photos/".$page_photo;
    
    if(in_array($extension, $allowed)){
        move_uploaded_file($tmp_name, $path);
    }else{
        echo "<script>alert('file not format')</script>";
    }
    
    if($size > 1000000){
        echo "<script>alert('Your image size is too big, try uploading images lower than 1mb')</script>";
    }
    else{
        $database = new Database;
        $created = $database -> page_post($page_id, $page_name, $page_pr_pic, $page_photo, $page_text);
        
        if($created == true){
            header("location: ../../advertisements");
        }
    }
}
if(isset($_POST['update_page'])){
    $page_id = $_POST['page_id'];
    $page_name = $_POST['page_name'];
    $page_cover_photo2 = $_POST['page_cover_photo2'];
    $page_type = $_POST['page_type'];
    $page_description = $_POST['page_description'];
    $page_phone = $_POST['page_phone'];
    if(empty($page_phone)){
        $page_phone = "Not Provided";
    }
    $page_email = $_POST['page_email'];
    if(empty($page_email)){
        $page_email = "Not Provided";
    }
    $page_whatsapp = $_POST['page_whatsapp'];
    if(empty($page_whatsapp)){
        $page_whatsapp = "Not Provided";
    }
    $page_link = $_POST['page_link'];
    if(empty($page_link)){
        $page_link = "Not Provided";
    }
    
    $image = $_FILES['page_cover_photo']['name'];
    $tmp_name = $_FILES['page_cover_photo']['tmp_name'];
    $size = $_FILES['page_cover_photo']['size'];
    $expImg = explode(".", $image);
    $extension = end($expImg);
    $allowed = ['jpg', 'jpeg', 'jfif', 'png', 'jfif', 'webp'];
    $page_cover_photo = str_replace([' ', '(', ')'], "", $expImg['0']) ."-". substr(str_shuffle("dfghnsgdfv152837bbfhdbgibewdufvdh62411vdh783it743y482y2gryhfhd"), 0, 5) . "." . $extension;
    $path = "../../../assets/page_cover_photos/".$page_cover_photo;

    if(in_array($extension, $allowed)){
        move_uploaded_file($tmp_name, $path);
    }else{
        echo "<script>alert('file not format')</script>";
    }
    
    if(empty($page_name)){
        echo "<script>alert('empty')</script>";
        // header("location: ../home");
    }elseif (!filter_var($page_link, FILTER_VALIDATE_URL)) {
        echo "<script>alert('invalid url!!')</script>";
    } 
    elseif($size > 1500000){
        echo "<script>alert('Your image size is too big, try uploading images lower than 1.5mb')</script>";
    }
    else{
        $database = new Database;
        $created = $database -> update_page($page_name, $page_type, $page_description, $page_whatsapp, $page_phone, $page_email, $page_link, $page_id);
        
        if($created == true){
            header("location: ./?id=$page_id");
        }
    }
}


if(isset($_POST['ua_uid'])){
    $uid = $_POST['ua_uid'];
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $state = $_POST['state'];
    $sec = $_POST['sec'];
    $hostel = $_POST['hostel'];
    $return = [];
    
    $database = new Database;
    if($database -> updateAccount($uid, $fname, $uname, $email, $bio, $phone, $dob, $state, $sec, $hostel)){
        $return['stat'] = "updated";
    }
    echo json_encode($return);
}

if(isset($_POST['follower_id'])){
    $page_id = $_POST['page_id'];
    $follower_id = $_POST['follower_id'];
    $follower_username = $_POST['follower_username'];
    $follower_img = $_POST['follower_img'];
    $verified = $_POST['verified'];
    $return = [];
    
    $database = new Database;
    if($database -> follow_page($page_id, $follower_id, $follower_username, $follower_img, $verified)){
        $return['stat'] = "followed";
    }
    echo json_encode($return);
}



























