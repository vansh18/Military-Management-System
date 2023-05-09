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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="<?php echo ASSETS.'js/login.js';?>"></script>
    <title>Login</title>
</head>
<body style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(<?php echo ASSETS.'/images/background.png';?>);background-size: cover; background-position: center;">
    <div class="left">
        <img class="tank-image" src="<?php echo ASSETS.'/images/armyphoto.png';?>" alt="army-img">
    </div>
    <div class="right">
        <div class="box">
            <form action="#">
                <div class="form-container">
                    <div class="input-container">
                        <label for="user-id"> User ID</label>
                        <input class="user-id" type="textbox" required autocomplete="off">
                        <i class="fa fa-user fa-sm" style="color: white;" aria-hidden="true"></i>
                    </div>
                    <div class="input-container">
                        <label for="password"> Password </label>
                        <i class="pass-icon"></i>
                        <input class="password" id="password" type="password"  required autocomplete="off">
                        <i class="fa fa-key fa-sm" style="color: white" aria-hidden="true"></i>
                        <div onclick="changeInputType()" id="eye" class="eye">
                            <i class="fa fa-eye fa-sm" id="eye-on" style="color: white" aria-hidden="true"></i>
                            <i class="fa fa-eye-slash fa-sm" id="eye-off" style="color: white" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="button">
                        <button class="login-button" type="button" value="Login" onclick="login('<?php echo BASE_URL;?>');">Login</button>
                    </div>
                    <div class="error-msg" id="error-msg">
                        <span id="error">

                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    function changeInputType() 
    {
        var passwordInput = document.getElementById("password");
        var passwordIconon = document.getElementById("eye-on"); 
        var passwordIconoff = document.getElementById("eye-off");
        if (passwordInput.type === "password") 
        {
            passwordInput.type = "text";
            passwordIconon.style.display = "none";  
            passwordIconoff.style.display = "flex";
        } 
        else 
        {
            passwordInput.type = "password";
            passwordIconon.style.display = "flex"; 
            passwordIconoff.style.display = "none"; 
        }
    }
    </script>
</body>
</html>
