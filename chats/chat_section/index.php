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
    <title>Gobook-Chats</title>
     <style>
        .cs_footer {
            border-radius: 20px;
            border: 1px solid grey;
        }
    </style>
</head>
<body>
<div class="head_nav">
    <center>
        <div class="row hheader">
            <div class="col-3" style="margin-top: .7rem;">
                <a href="../"><i class="bi bi-arrow-left-short" style="font-size: 35px; "></i></a>
            </div>
            <div class="col-7 mt-3">
                <h3 class="logo" style="font-size: 18px;"><img src="../../assets/images/profileimg.jpg" style="border-radius: 50%;" height="40px" width="40px" class="account"/> 
                    <span>@lawrencejr</span></h3>   
            </div>
            <div class="col-2 mt-3">
        
            </div>
        </div>
    </center>
</div>
    <br><br><br>
        <div class="container chat_sec_container">
            <div class="chat_sec_lhs">
                <div class="mychat cs_active_friends">
                    <h5>Active Friends</h5><hr>
                    <div class="chats_layout">
                        <div class="chatter">
                            <img src="../../assets/images/profileimg.jpg" style="border-radius: 50%;" height="45px" width="45px" class="account"/> 
                        </div>
                        <div class="chat">
                            <b>@lawrencejr</b><br>
                            <span>2 new message(s)</span>
                        </div>
                    </div>
                    <hr>
                    <div class="chats_layout">
                        <div class="chatter">
                            <img src="../../assets/images/aremoji11.png" style="border-radius: 50%;" height="45px" width="45px" class="account"/> 
                        </div>
                        <div class="chat">
                            <b>@babe_21</b><br>
                            <span>1 new message(s)</span>
                        </div>
                    </div>
                    <hr>
                    <div class="chats_layout">
                        <div class="chatter">
                            <img src="../../assets/images/aremoji6.png" style="border-radius: 50%;" height="45px" width="45px" class="account"/> 
                        </div>
                        <div class="chat">
                            <b>@big_x</b><br>
                            <span>1 new message(s)</span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="chat_sec_rhs">
                <div class="chat_space">
                    <div class="profile2">
                        <center>
                            <img src="../../assets/images/profileimg.jpg" alt=""><br>
                            <b>OPUTA LAWRENCE</b><br>
                            <span>@lawrencejr</span>
                        </center>
                    </div>
                    <br><br>
                    <div class="ichat">
                       <span> Afa?</span>
                    </div>
                    <div class="uchat">
                       <span> I dey</span>
                    </div>
                    
                </div>
                <br><br><br>
                <div class="cs_footer">
                    <img src="../../assets/images/profileimg.jpg" style="border-radius: 50%;" height="45px" width="45px" class="account"/> 
                    <input type="text" placeholder="type wetin u wan send">
                    <i class="bi bi-send-fill"></i>
                </div>
            </div>
        </div>
    <br><br><br><br>
    <footer>
        <div class="footer">
            
        </div>
    </footer>
    <script>
    function scrollDown(){
        let chatBox = document.documentElement
        chatBox.scrollTop = chatBox.scrollHeight
    }
    scrollDown();
</script>
</body>
</html>