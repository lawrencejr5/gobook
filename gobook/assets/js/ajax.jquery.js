$(document).ready(()=>{

    // Signin Ajax

    $('#signin').on('click', ()=>{

    let user = $("#user").val()
    let password = $("#password").val()

        $('#signin').html("Signing In.....")
        $.ajax({
            
            url: "../backend/class.php",
            type: "POST",
            dataType: "json",
            data: {
                user: user,
                password: password,
            },
            success: (response)=>{
                if(response.stat == "userEmpty"){
                    window.alert("Input your Username or Reg Number")
                    $('#signin').html("Login")
                }else if(response.stat == "passEmpty"){
                    window.alert("Input Your Password")
                    $('#signin').html("Login")
                }
                else if(response.stat == "noUser"){
                    window.alert("I don't think u have an account with us, Kindly check your details again or create an account")
                    $('#signin').html("Login")
                }
                else if(response.stat == "good"){
                    window.location = response.header;
                    $('#signin').html("Successful")
                }
                else if(response.stat == "failed"){
                    window.location = response.header;
                    $('#signin').html("Failed")
                }
            }
            
        })
    })

    // Signup Ajax

    $('#signup').on('click', ()=>{

        let fullname = $("#fullname").val()
        let regno = $("#regno").val()
        let phone = $("#phone").val()
        let password = $("#password").val()
        let cpassword = $("#cpassword").val()

       
        $('#signup').html("Signing Up.....")
        $.ajax({
            
            url: "../backend/class.php",
            type: "POST",
            dataType: "json",
            data: {
                fullname: fullname,
                regno: regno,
                phone: phone,
                password: password,
                cpassword: cpassword
            },
            success: (response)=>{
                if(response.stat == "fnameEmpty"){
                    console.log("Fname Empty")
                    $('#signup').html("Signup")
                }
                if(response.stat == "regnoEmpty"){
                    console.log("Regno Empty")
                    $('#signup').html("Signup")
                }
                else if(response.stat == "usernameEmpty"){
                    console.log("Username Empty")
                    $('#signup').html("Signup")
                }
                else if(response.stat == "passEmpty"){
                    console.log("Password Empty")
                    $('#signup').html("Signup")
                }
                else if(response.stat == "cpassEmpty"){
                    console.log("Confirm Your Password")
                    $('#signup').html("Signup")
                }
                else if(response.stat == "passNotMatch"){
                    console.log("Password Do Not Match")
                    $('#signup').html("Signup")
                }
                else if(response.stat == "good"){
                    $('#signup').html("Success")
                    window.location = response.header;
                }else if(response.stat == "failed"){
                    $('#signup').html("Something Went Wrong")
                    window.location = response.header;
                }
            }
            
        })
        
    })

    // Post Ajax

    $('#post').on('click', ()=>{

        
        // let user_id = $("#user_id").val()
        // let poster = $("#poster").val()
        // let text_post = $("#text_post").val()
        // let public = $("#public").val()
        // let img_post = $("#img_post").val()
        // let anonymous = $("#anonymous").val()

        // console.log(img_post)

        $('#post').html("Posting...")
        $('#post').html("Posted...")
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
        //     success: (response)=>{
        //         if(response.stat == "posted"){
        //             console.log("Posted")
        //             $('#post').html("Posted")
        //             window.location = response.header;
        //         }
        //     }
        // })
    })

})