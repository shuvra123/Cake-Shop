<?php 
  session_start(); 
include "./includes/connection.php";

  $login = $_POST['login'];
  

  if (isset($login)) {
   $username = $_POST['username']; 
   $password = $_POST['password'];
   $username = mysqli_real_escape_string($conn,$username); 
   $password = mysqli_real_escape_string($conn,$password);
   
   $sql = "SELECT * FROM user WHERE username=? AND password=? ";

   $stmt = $conn->prepare($sql);
   $stmt->bind_param("ss",$username,$password);
   $stmt->execute();
   $result = $stmt->get_result();
   $row = $result->fetch_assoc();

   $_SESSION['username'] = $row['username'];
   $_SESSION['name'] = $row['name'];
   $_SESSION['email'] = $row['email'];
   $_SESSION['uid'] = $row['id'];


   if($result->num_rows==1)
   {
       header("location:./index.php");
   }
//    else if($result->num_rows==1 && $_SESSION['role']=="admin")
//    {
//        header("location:../index.php");
//    }
   else
   {
    
        
    
    header("Location:./login.php?error=Sorry, that username or password is incorrect. Please try again.");
    
        
   }


} 
?>

