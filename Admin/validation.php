<?php 
  ob_start();
  session_start();
  include "./connection.php";

  

  if (isset($_POST['login'])) {
   $username = $_POST['username']; 
   $password = $_POST['password'];
   $username = mysqli_real_escape_string($conn,$username); 
   $password = mysqli_real_escape_string($conn,$password);
   
   $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";

   $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);


   
        $_SESSION['admin_username']=$row['username'];

   

   if($count==1)
   {
       
       header("location:./Admin/index.php");
   }
   else

   {
    
        
    
    header("Location:./index.php?error=Sorry, that username or password is incorrect. Please try again.");
    
        
   }


} 
?>
