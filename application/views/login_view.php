<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS.'css/login.css';?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="<?php echo ASSETS.'js/login.js';?>"></script>
    <title>Login</title>
</head>
    <body style = "background: url(<?php echo ASSETS.'images/background.png';?>);">
    <div class="box">
        <form method="post" action="" autocomplete="off" id="login-form">

            <div class="input_box">
                <span>User id</span>
                <ion-icon name="mail-outline" class="icon"></ion-icon>
                <input type="email" name="email" id="email_box" required = "required" autofocus >
            </div>

            <div class="input_box">
                <span>Password</span>
                <div onclick="changeInputType()" id="eye" class="eye">
                    <ion-icon id="password-icon" name="eye-off-outline"></ion-icon>
                </div>
                <ion-icon name="key-outline" class="icon"></ion-icon>
                <input type="password" name="password" id="password_box" required = "required">
            </div>

            <div class="forgot_password">
                <a href="<?php echo BASE_URL."signup"; ?>">Don't have an account</a>
            </div>
            <button type="submit" class="submit_button" onclick="login(<?php echo BASE_URL.'validate-user';?>)">Login</button>
            <div id="error-message" class="error-message"></div>    

        </form>
    </div>
</body>
</html>