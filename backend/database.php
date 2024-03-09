<?php
session_start();
include "controller.php";
class Database extends Controller{

    protected $sql;

    // Signup user

    public function signupUser($fullname, $regno, $gender, $password, $username, $phone, $email, $dob, $bio, $hostel, $sec_sch, $state, $profile_pic, $school_set, $department){

        $this -> sql = "INSERT INTO user(fullname, reg_no, gender, password, username, phone, email, dob, bio, hostel, sec_sch, state, profile_pic, school_set, department) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        try{
            $this -> insertRow([$fullname, $regno, $gender, $password, $username, $phone, $email, $dob, $bio, $hostel, $sec_sch, $state, $profile_pic, $school_set, $department], $this -> sql);
            return true;
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }

    }

    public function addUsername($username, $id){

        $this -> sql = "UPDATE user SET username = ? WHERE id = ?";
        try{
            $this -> insertRow([$username, $id], $this -> sql);
            return true;
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }

    }

    // Signin User
    public function signinUser($user, $password){
        if($this -> fieldEmpty($user) == true)
        {
            header("location: ./?error = Please input username or reg number");
        }
        elseif($this -> fieldEmpty($password) == true)
        {
            header("location: ./?error = Please input password");
        }
        elseif($this -> fieldEmpty($user) && $this -> fieldEmpty($password))
        {
            header("location: ./?error = All fields are empty");
        }
        else
        {
            $this -> sql = "SELECT * FROM user WHERE (username = ? OR reg_no = ?) AND password = ?";
            try{
                if($this -> num_of_users([$user, $user, $password], $this -> sql) === 0){
                    return false;
                }else{
                    $get['user'] = $this -> readRow([$user, $user, $password], $this -> sql);
                    foreach($get['user'] as $user){
                        $_SESSION['secret'] = "uehwfhh8[9q3yr37p98p349-2032128h3denkmds";
                        $_SESSION['profile_pic'] = $user['profile_pic'];
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['password'] = $user['password'];
                    }
                    // header("location: ../home?msg = Signed In");
                    return true;
                }
            }catch(PDOException $e){
                return "Error!" . $e -> getMessage();
            }
        }
    }

    // Post
    public function createPost($user_id, $poster, $poster_img, $text_post, $public, $img_post, $anonymous, $verified){
        $this -> sql = "INSERT INTO posts(user_id, poster, poster_img, text_post, public, img_post, anonymous, verified) VALUES(?,?,?,?,?,?,?,?)";
        try{
            $this -> insertRow([$user_id, $poster, $poster_img, $text_post, $public, $img_post, $anonymous, $verified], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
         }
    }

    public function comment($user_id, $post_id, $comment, $commenter, $user_pic, $verified){
        $this -> sql = "INSERT INTO comments(user_id, post_id, comment, commenter, user_pic, verified) VALUES(?,?,?,?,?,?)";
        try{
            $this -> insertRow([$user_id, $post_id, $comment, $commenter, $user_pic, $verified], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
         }
    }

    public function like($user_id, $post_id, $user, $user_img, $verified){
        if($this -> check_liked($post_id, $user_id) == 0)
        {
            $this -> sql = "INSERT INTO likes(user_id, post_id, user, user_img, verified) VALUES(?,?,?,?,?)";
            try{
                $this -> insertRow([$user_id, $post_id, $user, $user_img, $verified], $this -> sql);
                return true;
             }catch(PDOException $e){
                 return false . $e -> getMessage();
             }
        }
        elseif($this -> check_liked($post_id, $user_id) == 1)
        {
            $this -> sql = "DELETE FROM likes WHERE user_id = ? AND post_id = ?";
            try{
                $this -> insertRow([$user_id, $post_id], $this -> sql);
                return true;
             }catch(PDOException $e){
                 return false . $e -> getMessage();
             }
        }
    }
    
    public function createNotification($user_id, $user_id2, $username, $username2, $profileImg, $profileImg2, $verified, $type){
        $this -> sql = "INSERT INTO notifications(user_id, user_id2, username, username2, profileImg, profileImg2, verified, type) VALUES(?,?,?,?,?,?,?,?)";
        try{
            $this -> insertRow([$user_id, $user_id2, $username, $username2, $profileImg, $profileImg2, $verified, $type], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
         }
    }
    
     public function addFriend($user_id, $username, $fullname, $profileImg, $user_id2, $username2, $fullname2, $profileImg2, $verified){
        if($this -> check_added_friend($user_id, $user_id2) == 0){
            $this -> sql = "INSERT INTO friend_requests(user_id, username, fullname, profile_pic, user_id2, username2, fullname2, profile_pic2, verified) VALUES(?,?,?,?,?,?,?,?,?)";
            try{
               return $this -> insertRow([$user_id, $username, $fullname, $profileImg, $user_id2, $username2, $fullname2, $profileImg2, $verified], $this -> sql);
               
            }catch(PDOException $e){
                return false . $e -> getMessage();
            }
        }elseif($this -> check_added_friend($user_id, $user_id2) == 1){
            $this -> sql = "DELETE FROM friend_requests WHERE user_id = ? AND user_id2 = ?";
            try{
               return $this -> deleteRow([$user_id, $user_id2], $this -> sql);
            }catch(PDOException $e){
                return false . $e -> getMessage();
            }
        }
    }
    
    public function create_page($user_id, $page_name, $page_type, $page_description, $page_cover_photo, $page_pr_img, $page_username, $page_whatsapp, $page_phone, $page_email, $page_link){
       $this -> sql = "INSERT INTO pages(user_id, page_name, page_type, page_description, page_cover_photo, pr_pic, username, whatsapp, phone, email, page_link) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        try{
            $this -> insertRow([$user_id, $page_name, $page_type, $page_description, $page_cover_photo, $page_pr_img, $page_username, $page_whatsapp, $page_phone, $page_email, $page_link], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
    public function update_page($page_name, $page_type, $page_description, $page_whatsapp, $page_phone, $page_email, $page_link, $page_id){
       $this -> sql = "UPDATE pages SET page_name = ?, page_type = ?, page_description = ?, whatsapp = ?, phone = ?, email = ?, page_link = ? WHERE id = ?";
        try{
            $this -> insertRow([$page_name, $page_type, $page_description, $page_whatsapp, $page_phone, $page_email, $page_link, $page_id], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
   
    public function follow_page($page_id, $follower_id, $follower_username, $follower_img, $verified){
       $this -> sql = "INSERT INTO page_followers(page_id, follower_id, follower_username, follower_img, verified) VALUES(?,?,?,?,?)";
        try{
            $this -> insertRow([$page_id, $follower_id, $follower_username, $follower_img, $verified], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
    public function page_post($page_id, $page_name, $page_pr_pic, $page_photo, $page_text){
       $this -> sql = "INSERT INTO page_posts(page_id, page_name, page_pr_pic, page_photo, page_text) VALUES(?,?,?,?,?)";
        try{
            $this -> insertRow([$page_id, $page_name, $page_pr_pic, $page_photo, $page_text], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
   public function page_post_likes($post_id, $liker_id, $like_type){
       $this -> sql = "SELECT * FROM page_posts_likes WHERE post_id = ? AND liker_id = ? AND type = ?";
       try{
          return $this -> numOf([$post_id, $liker_id, $like_type], $this -> sql);
       }catch(PDOException $e){
         return false . $e -> getMessage();
       }
   }
   
   public function num_of_page_post_likes($post_id, $like_type){
       $this -> sql = "SELECT * FROM page_posts_likes WHERE post_id = ? AND type = ?";
       try{
          return $this -> numOf([$post_id, $like_type], $this -> sql);
       }catch(PDOException $e){
         return false . $e -> getMessage();
       }
   }
   
   public function like_page_post($post_id, $liker_id, $page_id, $like_type){
       try{
           if($this -> page_post_likes($post_id, $liker_id, $like_type) == 1){
               $this -> sql = "DELETE FROM page_posts_likes WHERE post_id = ? AND liker_id = ?";
               $this -> deleteRow([$post_id, $liker_id], $this -> sql);
           }elseif($this -> page_post_likes($post_id, $liker_id, $like_type) == 0){
              $this -> sql = "INSERT INTO page_posts_likes(post_id, liker_id, page_id, type) VALUES(?,?,?,?)";
               $this -> insertRow([$post_id, $liker_id, $page_id, $like_type], $this -> sql);
           }
          
          return true;
       }catch(PDOException $e){
         return false . $e -> getMessage();
       }
   }
   
   public function comment_page_post($post_id, $commenter_id, $page_id, $comment){
       $this -> sql = "INSERT INTO page_post_comment(post_id, commenter_id, page_id, comment) VALUES(?,?,?,?)";
       try{
           $this -> insertRow([$post_id, $commenter_id, $page_id, $comment], $this -> sql);
           return true;
       }catch(PDOException $e){
           return false. $e->getMessage();
       }
   }
   
   public function get_page_post_comments($post_id){
       $this -> sql = "SELECT * FROM page_post_comment WHERE post_id = ? ORDER BY id DESC";
       try{
           return $this -> readRow([$post_id], $this -> sql);
       }catch(PDOException $e){
           return false. $e->getMessage();
       }
   }
   
   public function numOf_page_post_comments($post_id){
       $this -> sql = "SELECT * FROM page_post_comment WHERE post_id = ? ORDER BY id DESC";
       try{
           return $this -> numOf([$post_id], $this -> sql);
       }catch(PDOException $e){
           return false. $e->getMessage();
       }
   }
    
    public function accept_friend_request($user_id, $user_id2){
        $this -> sql = "UPDATE friend_requests SET status = 'accepted' WHERE user_id = ? and user_id2 = ?";
        try{
            $this -> updateRow([$user_id, $user_id2], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
    }
    
    public function decline_friend_request($user_id, $user_id2){
        $this -> sql = "UPDATE friend_requests SET status = 'declined' WHERE user_id = ? and user_id2 = ?";
        try{
            $this -> updateRow([$user_id, $user_id2], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
    }
    
    public function updateAccount($uid, $fname, $uname, $email, $bio, $phone, $dob, $state, $sec, $hostel){
        $this -> sql = "UPDATE user SET fullname = ?, username = ?, email = ?, bio = ?, phone = ?, dob = ?, state = ?, sec_sch = ?, hostel = ? WHERE id = ?";
        try{
            $this -> updateRow([$fname, $uname, $email, $bio, $phone, $dob, $state, $sec, $hostel, $uid], $this -> sql);
            return true;
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
    }

    // Get User
    public function getUser($id){
        $this -> sql = "SELECT * FROM user WHERE id = ?";
        try{
           return $this -> readRow([$id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function getUsers(){
        $this -> sql = "SELECT * FROM user ORDER BY department";
        try{
           return $this -> readRow([], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function getFrUsers($uID){
        $this -> sql = "SELECT * FROM user WHERE NOT id = ? ORDER BY dob";
        try{
           return $this -> readRow([$uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function getHusers(){
        $this -> sql = "SELECT * FROM user ORDER BY rand() LIMIT 5";
        try{
           return $this -> readRow([], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function getUserss(){
        $this -> sql = "SELECT * FROM user ORDER BY id DESC LIMIT 5";
        try{
           return $this -> readRow([], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }

    public function getPosts(){
        $this -> sql = "SELECT * FROM posts WHERE public = 'yes' ORDER BY id DESC LIMIT 1";
        try{
           return $this -> readRow([], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    public function getPostsss($start, $limit){
        $this -> sql = "SELECT * FROM posts WHERE public = 'yes' ORDER BY id DESC LIMIT $start, $limit";
        try{
           return $this -> readRow([], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    public function numOfPostsss($start, $limit){
        $this -> sql = "SELECT * FROM posts WHERE public = 'yes' ORDER BY id DESC LIMIT $start, $limit";
        try{
           return $this -> numOf([], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    public function getComments($post_id){
        $this -> sql = "SELECT * FROM comments WHERE post_id = ? ORDER BY id ASC";
        try{
           return $this -> readRow([$post_id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    public function getNumOfComments($post_id){
        $this -> sql = "SELECT * FROM comments WHERE post_id = ?";
        try{
           return $this -> numOf([$post_id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    public function getMyPosts($id){
        $this -> sql = "SELECT * FROM posts WHERE user_id = ? AND anonymous = 'no' ORDER BY id DESC";
        try{
           return $this -> readRow([$id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    public function getAPost($id){
        $this -> sql = "SELECT * FROM posts WHERE id = ?";
        try{
           return $this -> readRow([$id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    public function likes($post_id){
        $this -> sql = "SELECT DISTINCT post_id, user_id FROM likes WHERE post_id = ?";
        try{
           return $this -> numOf([$post_id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }

    public function check_liked($post_id, $user_id){
        $this -> sql = "SELECT post_id, user_id FROM likes WHERE post_id = ? and user_id = ?";
        try{
           return $this -> numOf([$post_id, $user_id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function getNumOfLikes($post_id){
        $this -> sql = "SELECT * FROM likes WHERE post_id = ?";
        try{
           return $this -> numOf([$post_id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function getLikes($post_id){
        $this -> sql = "SELECT * FROM likes WHERE post_id = ?";
        try{
           return $this -> readRow([$post_id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function check_added_friend($user_id, $user_id2){
        $this -> sql = "SELECT user_id, user_id2 FROM friend_requests WHERE (user_id = ? and user_id2 = ?) OR (user_id2 = ? and user_id = ?)";
        try{
           return $this -> numOf([$user_id, $user_id2, $user_id, $user_id2], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function friendRequests($uID){
        $this -> sql = "SELECT * FROM friend_requests WHERE user_id2 = ? and status = 'sent'";
        try{
           return $this -> readRow([$uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
    
    public function numOfFriendRequests($uID){
        $this -> sql = "SELECT * FROM friend_requests WHERE user_id2 = ? AND status = 'sent'";
        try{
           return $this -> numOf([$uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
    }
   
   public function getPages(){
       $this -> sql = "SELECT * FROM pages";
        try{
           return $this -> readRow([], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   
   public function getMyPages($uID){
       $this -> sql = "SELECT * FROM pages WHERE user_id = ?";
        try{
           return $this -> readRow([$uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   
   public function getAPage($id){
       $this -> sql = "SELECT * FROM pages WHERE id = ?";
        try{
           return $this -> readRow([$id], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   
   public function get_pages_followed($uid){
       $this -> sql = "SELECT page_id FROM page_followers WHERE follower_id = ? ORDER BY page_id DESC";
        try{
           return $this -> readRow([$uid], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   
   public function get_page_followers($page_id){
       $this -> sql = "SELECT * FROM page_followers WHERE page_id = ?";
        try{
            return $this -> numOf([$page_id], $this -> sql);
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
    public function check_page_followed($page_id, $follower_id){
       $this -> sql = "SELECT * FROM page_followers WHERE page_id = ? and follower_id = ?";
        try{
            return $this -> numOf([$page_id, $follower_id], $this -> sql);
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
    public function if_followed_any_page($follower_id){
       $this -> sql = "SELECT * FROM page_followers WHERE follower_id = ?";
        try{
            return $this -> numOf([$follower_id], $this -> sql);
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
    public function get_page_post_numbers($page_id){
       $this -> sql = "SELECT * FROM page_posts WHERE page_id = ?";
        try{
            return $this -> numOf([$page_id], $this -> sql);
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
    public function get_page_posts($page_id){
       $this -> sql = "SELECT * FROM page_posts WHERE page_id = ? ORDER BY id DESC";
        try{
            return $this -> readRow([$page_id], $this -> sql);
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
   
    public function get_a_page_post($id){
       $this -> sql = "SELECT * FROM page_posts WHERE id = ?";
        try{
            return $this -> readRow([$id], $this -> sql);
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
    
    public function get_all_page_posts(){
       $this -> sql = "SELECT * FROM page_posts ORDER BY id DESC";
        try{
            return $this -> readRow([], $this -> sql);
         }catch(PDOException $e){
             return false . $e -> getMessage();
        }
   }
    
   
   public function myFriends($uID){
       $this -> sql = "SELECT * FROM friend_requests WHERE (user_id = ? OR user_id2 = ?) AND status = 'accepted' ORDER BY id DESC LIMIT 5";
        try{
           return $this -> readRow([$uID, $uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   public function allMyFriends($uID){
       $this -> sql = "SELECT * FROM friend_requests WHERE (user_id = ? OR user_id2 = ?) AND status = 'accepted' ORDER BY id DESC";
        try{
           return $this -> readRow([$uID, $uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   public function numOfFriends($uID){
       $this -> sql = "SELECT * FROM friend_requests WHERE (user_id = ? OR user_id2 = ?) AND status = 'accepted'";
        try{
           return $this -> numOf([$uID, $uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   
   public function myNotifications($uID){
       $this -> sql = "SELECT * FROM notifications WHERE user_id2 = ? ORDER BY id DESC";
        try{
           return $this -> readRow([$uID], $this -> sql);
        }catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   
   public function search($input){
       $this -> sql = "SELECT * FROM user WHERE (fullname LIKE '%$input%') OR (username LIKE '%$input%') OR (department LIKE '$input%') OR (`state` LIKE '$input%')";
       try{
            
            if(($this -> numOf([], $this -> sql)) == 0){
                return "Does not exist";
            }else{
                return $this -> readRow([], $this -> sql);
            }
        }
        catch(PDOException $e){
            return false . $e -> getMessage();
        }
   }
   
   
   
   
   
   
}