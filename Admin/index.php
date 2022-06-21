<?php 
  ob_start();
  session_start();
  include "./connection.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="loginbox">
        
        <h1>Admin Login</h1>
        <form action="./validation.php" id="form" method="post">
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
                <!-- <button class="signin-button" id="submit" name="login" >Login</button><br> -->
                <input type="submit" name="login" value="login">
            
            <a href="#">Don't have an account?</a>
        </form>
    </div>
    <script src="./validation.js"></script>
</body>
</html>