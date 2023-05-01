<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo ASSETS.'css/login.css';?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?php echo ASSETS.'js/login.js';?>"></script>
    <title>Login</title>
</head>
<body style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo ASSETS.'images/background.png';?>);background-size: cover; background-position: center;"> 
    <div class="box">
        <div class="heading-container"> 

        </div>
        <form action="">
            <div class="form-container">
                <div class="input-container">
                    <label for="user-id"> User ID</label>
                    <input class="user-id" type="textbox" required autocomplete="off">
                    <i class="fa fa-user fa-sm" style="color: white;" aria-hidden="true"></i>
                </div>
                <div class="input-container">
                    <label for="password"> Password </label>
                    <i class="pass-icon"></i>
                    <input class="password" type="password" required autocomplete="off">
                    <i class="fa fa-key fa-sm" style="color: white";aria-hidden="true"></i>
                </div>
                <div class="button">
                    <button class="login-button" type="button" value="Login" onclick="login('<?php echo BASE_URL;?>');">Login</button>
                </div>
                <div class="error-msg" id="error-msg">
                    <span id="error">
                    </span>
                 </span>
                </div>
            </div>
        </form>
    </div>
    <script>
        // function login()
    //     {
    //     var error = document.getElementById("error");
    //     var username = document.getElementsByClassName("user-id")[0].value;
    //     if(username == 'a'){
    //     console.log("hi")
        // document.getElementById('error-msg').style.display = 'flex';
        // error.innerHTML = "Username or Password entered is wrong. Please try again"
    //     }
    // }
    </script>
</body>
</html>
