<?php
   session_start(); 
   include "./includes/connection.php";
   
   if (isset($_POST['purchase'])) {
      $name = $_POST['name'];
      $number = $_POST['number'];
      $address = $_POST['address'];
      $pmethod = $_POST['pmethod'];
      $uid = $_SESSION['uid'];
   
   
      $queary1 = "INSERT INTO `order_manager`(`name`, `number`, `address`, `pmethod`, `uid`) VALUES ('$name','$number','$address','$pmethod','$uid')";
   
      if (mysqli_query($conn, $queary1)) {
   
          $order_id = mysqli_insert_id($conn);
   
          $queary2 = "INSERT INTO `user_orders`(`order_id`, `p_id`, `p_code`, `pprice`, `quantity`) VALUES (?,?,?,?,?)";
   
          $stmt = mysqli_prepare($conn,$queary2);
          if ($stmt) {
   
              mysqli_stmt_bind_param($stmt,"iissi",$order_id,$p_id,$p_code,$pprice,$quantity);
   
              foreach ($_SESSION['cart'] as $key => $value) {
                  $p_id = $value['product_id']; 
                  $p_code = $value['pcode'];
                  $pprice = $value['price'];
                  $quantity = $value['quantity'];
   
                  mysqli_stmt_execute($stmt);
   
                  unset($_SESSION['cart']);
                  echo "<script>alert('Order plased...')</script>";
                  echo "<script>window.location = './index.php'</script>";
              }
              
          }
          else{
              echo "<script>alert('SQL queary error...')</script>";
              echo "<script>window.location = './placeorder.php'</script>";
          }
          
      }
      else{
          echo "<script>alert('SQL error...')</script>";
          echo "<script>window.location = './placeorder.php'</script>";
      }
   }
   
   
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Fresh meal</title>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
      <link rel="stylesheet" href="./css/style.css">
      <link rel="stylesheet" href="./css/placeorder.css">
      <link rel="stylesheet" href="./css/orderbtn.css">
      <!-- font awesome -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;display=swap">

      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
   </head>
   <body>
      <div class="main-wrapper">
         <div class="nav-background">
            <div class="mobile-logo">
               <img src="./icons/logo.svg" alt="">
            </div>
         </div>
         <div class="site-content-wrapper">
            <div class="nav-trigger">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-bar-chart">
                  <line x1="12" y1="20" x2="12" y2="10" />
                  <line x1="18" y1="20" x2="18" y2="4" />
                  <line x1="6" y1="20" x2="6" y2="16" />
               </svg>
            </div>
            <div class="site-content">
               <nav>
                  <div class="top">
                     <div class="container flex justify-between">
                        <div class="contact flex items-center">
                           <img src="./icons/phone.svg" alt="">
                           <div>
                              <h5>Call US: (+8001) 123 456 789</h5>
                              <h6>E-mail : support@freshmeal.com</h6>
                           </div>
                        </div>
                        <div class="branding">
                           <img src="./icons/logo.svg" alt="">
                        </div>
                        <div class="time flex items-center">
                           <img src="./icons/clock.svg" alt="">
                           <div>
                              <h5>Working Hours:</h5>
                              <h6>Mon - Sat (8.00am - 12.00am)</h6>
                           </div>
                        </div>
                     </div>
                  </div>
               </nav>
               <div class="formcontainer">
                  <form action="./placeorder.php" method="POST" autocomplete="off">
                     <div class="row">
                        <div class="col-25">
                           <label for="fname">Name</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="name" name="name" value="<?php echo $_SESSION['name'] ?>" placeholder="Your name..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="number">Number</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="number" name="number" placeholder="Your Phone number.." required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="address">Address</label>
                        </div>
                        <div class="col-75">
                           <textarea id="address" name="address" placeholder="Your billing Address.." style="height:200px" required></textarea>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="country">Payment Method</label>
                        </div>
                        <div class="col-75">
                           <select id="pmethod" name="pmethod">
                              <option value="COD">Cash on Delevary</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <input type="hidden" name="uid" value="<?php echo $_SESSION['uid'] ?>">
                     </div>
                     <div class="row">
                        <button name="cancle" class="btn btn-primary"><a style="text-decoration: none;" href="./cart.php">Cancel</a></button>
                        <!-- <input type="submit" name="purchase" value="Place Order"> -->
                        <button type="submit" name="purchase" class="order"><span class="default">Complete Order</span><span class="success">Order Placed<svg viewbox="0 0 12 10">
            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
        </svg></span>
    <div class="box"></div>
    <div class="truck">
        <div class="back"></div>
        <div class="front">
            <div class="window"></div>
        </div>
        <div class="light top"></div>
        <div class="light bottom"></div>
    </div>
    <div class="lines"></div>
</button>


                     </div>
                  </form>
               </div>
               <footer>
                  <div class="container">
                     <div class="box">
                        <h3>About us</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, ut doloribus nobis corrupti neque unde, praesentium mollitia, autem omnis fuga in quas iusto culpa deleniti qui. Quasi magni minus aliquam.</p>
                        <button class="btn btn-secondary">Read More</button>
                     </div>
                     <div class="box">
                        <h3>Quik Links</h3>
                        <ul>
                           <li>
                              <a href="index.php">Home</a>
                           </li>
                           <li>
                              <a href="about.php">About us</a>
                           </li>
                           <li>
                              <a href="product.php">Products</a>
                           </li>
                           <!-- <li>
                              <a href="#">Blog</a>
                           </li> -->
                           <li>
                              <a href="#service">Services</a>
                           </li>
                           <!-- <li>
                              <a href="#">Gallery</a>
                           </li> -->
                           <li>
                              <a href="#contact">Contact us</a>
                           </li>
                        </ul>
                     </div>
                     <div class="box">
                        <h3>Follow Us</h3>
                        <div>
                           <ul>
                              <li>
                                 <a href="https://www.facebook.com/codersgyan">
                                 <img src="./icons/facebook.svg" alt="">
                                 <span>Facebook</span>
                                 </a>
                              </li>
                              <li>
                                 <a href="https://twitter.com/CoderGyan">
                                 <img src="./icons/twitter.svg" alt="">
                                 <span>Twitter</span>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="./icons/google.svg" alt="">
                                 <span>Google +</span>
                                 </a>
                              </li>
                              <li>
                                 <a href="https://www.instagram.com/codersgyan/">
                                 <img src="./icons/instagram.svg" alt="">
                                 <span>Instagram</span>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="box instagram-api">
                        <h3>Instagram</h3>
                        <div class="post-wrap">
                           <div>
                              <img src="./images/food-table.jpg" alt="">
                           </div>
                           <div>
                              <img src="./images/food-table.jpg" alt="">
                           </div>
                           <div>
                              <img src="./images/food-table.jpg" alt="">
                           </div>
                           <div>
                              <img src="./images/food-table.jpg" alt="">
                           </div>
                           <div>
                              <img src="./images/food-table.jpg" alt="">
                           </div>
                           <div>
                              <img src="./images/food-table.jpg" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </footer>
               <footer class="copyright">
                  <div>
                     Copyright © 2020 .All rights reserved by <a href="#">Shuvra, Adiba, Tahsin</a>.
                  </div>
               </footer>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
      <script src="js/app.js"></script>
      <script src="js/btn.js"></script>
   </body>
</html>