<?php
session_start(); 
include "./includes/connection.php";

if($_POST){
    $name = $_POST['name'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    

    $sql = "INSERT INTO user (name, username, email, password) VALUE ('$name','$username','$email','$pass')";

    if($conn->query($sql) === TRUE){
        echo "<script>alert('Registration Successfull')</script>" ;
    }
    else{
        echo "Error". $sql . ' ' . $conn->connect_error;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./css/reg-style.css" type="text/css">
</head>
<body>
    <div class="main">
<div class="registration">
    <h2>Register Here</h2>
    <form action = "<?= $_SERVER['PHP_SELF']?>" id="register" method="post">
        <label> Name : </label>
        <br>
        <input type="text" name="name" placeholder="Enter your name">
        
        <br><br>
        <label>user Name : </label>
        <br>
        <input type="text" name="uname" placeholder="Enter your user name">
        
        <br><br>
        
    
        <label>Email : </label>
        <br>
        <input type="email" name="email" placeholder="Enter your valid email">
        <br><br>
        
        <label>password: </label>
        <br>
        <input type="password" name="password" placeholder="Enter your password">
        <br><br>
        
        <label>confirm password: </label>
        <br>
        <input type="password" name="cpassword" placeholder="Enter your confirm password">
        <br><br>
        
        <input type="submit" value="submit" name="submit" id="submit">
        <br>
        <a href="./login.php">Login now</a>
    </form>
</div><!--end registration-->
    </div> <!--end main-->
</body>
</html>