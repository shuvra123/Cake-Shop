<?php 
session_start(); 
include "./includes/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Design</title>
    
    <link rel="stylesheet" type="text/css" href="./css/login-style.css">
</head>
<body>
  
    <div class="loginbox">
        <img src="./images/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form action="./login-check.php" id="form" method="post" autocomplete="off">
            <div class="form-control">
                
                <p>Username</p>
                <input type="text" name="username" id="username" placeholder="Enter  Username">
                <small>Error message</small>
                </div>
            <div class="form-control">
                <p>Password</p>
                <input type="password" name="password" id="password" placeholder="Enter password">
                <small>Error message</small>
                </div>
                <button class="signin-button" id="submit" name="login" onclick="check();">Login</button><br>
            
            <a href="./reg.php">Don't have an account?</a>
        </form>
    </div>
    <script src="./js/login-validation.js"></script>
</body>
</html>