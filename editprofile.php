<?php
 session_start(); 
include "./includes/connection.php";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_SESSION['uid'];
    
    $sql = "UPDATE user SET email = '$email', name = '$name', username = '$username', password = '$password' WHERE id = '$id'";
    if($conn->query($sql) === TRUE) {
        $_SESSION['username'] = $username;
       $_SESSION['name'] = $name;
       $_SESSION['email'] = $email;
    
        echo "<script>alert('Save changes Successfully...')</script>";
        echo "<script>window.location = './profile.php'</script>";
    
    } else {
    echo "Erorr while updating record : ". $conn->error;
    }
    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/placeorder.css">
    <link rel="stylesheet" href="./css/product.css">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="main-wrapper">
        <div class="nav-background">
            <div class="mobile-logo">
                <img src="./icons/logo.svg" alt="">
            </div>
            <div class="mobile-nav">
                <div class="cart">
                    <div class="flex items-center">
                        <img src="./icons/cart-dark.svg" alt="">
                        <a href="./cart.php"><?php if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);

                            echo $count;
                        }else{
                            echo "0";
                        } ?> Items - ($0.00)</a>
                    </div>
                </div>
                <div class="nav-top">
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
                        <li>
                            <a href="profile.php">Profile</a>
                        </li>
                        
                        <li>
                            <a href="#service">Services</a>
                        </li>
                        <li>
                            <a href="#contact">Contact us</a>
                        </li>
                        
                        <li>
                            <a href="#">Log in</a>
                        </li>
                        <li>
                            <a href="#">Register</a>
                        </li>
                    </ul>
                </div>
                <div class="contact flex items-center">
                    <img src="./icons/phone.svg" alt="">
                    <div>
                        <h5>Call us: (+8801) 123 456 789</h5>
                        <h6>E-mail : support@freshmeal.com</h6>
                    </div>
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
        <div class="site-content-wrapper">
            <div class="nav-trigger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-bar-chart">
                    <line x1="12" y1="20" x2="12" y2="10" />
                    <line x1="18" y1="20" x2="18" y2="4" />
                    <line x1="6" y1="20" x2="6" y2="16" /></svg>
            </div>
            <div class="site-content">
                <header class="topbar">
                    <div class="container flex justify-between items-center">
                        
                        <div class="auth flex items-center">
                            <?php

                            if(!isset($_SESSION['username'])){ ?>

                            <div>
                                <img src="./icons/user-icon.svg" alt="">
                                <a href="./login.php">Log in</a>
                            </div>
                            <span class="divider">|</span>
                            <div>
                                <img src="./icons/edit.svg" alt="">
                                <a href="./reg.php">Register Now</a>
                            </div>
                            <span class="divider">|</span>

                            <?php }
                            else{
                                echo "<div>
                                
                                <a href='./profile.php'>". $_SESSION['name'] . "</a>
                            </div>
                            <span class='divider'>|</span>
                            <div>
                                <a href='./logout.php'>Logout</a>
                            </div>
                            <span class='divider'>|</span>";
                            }
                            ?>
                            <div>
                                <img src="./icons/cart.svg" alt="">
                                <a href="./cart.php"><?php if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);

                            echo $count;
                        }else{
                            echo "0";
                        } ?> Items - ($0.00)</a>
                            </div>
                        </div>
                    </div>
                </header>

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
                    <div class="navbar magic-shadow">
                        <div class="container flex justify-center">
                            <a href="./index.php" class="active">Home</a>
                            <a href="./about.php">About us</a>
                            <a href="./product.php">Products</a>
                            <a href="./profile.php">Profile</a>
                            <a href="./index.php#service">Services</a>
                            <!-- <a href="#">Gallery</a> -->
                            <a href="./index.php#contact">Contact us</a>
                        </div>
                    </div>
                </nav>
                
                     <div class="formcontainer">
                  <form action="./editprofile.php" method="POST" autocomplete="off">
                    <?php 
                    $u_id = $_SESSION['uid'];
                      $sql1 = "SELECT * FROM user WHERE id = '$u_id'";
                        $result = $conn->query($sql1);
                        $row = $result->fetch_assoc(); ?>
                     <div class="row">
                        <div class="col-25">
                           <label for="username">Username</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>" placeholder="Your username..">
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-25">
                           <label for="fname">Name</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>" placeholder="Your name..">
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-25">
                           <label for="email">email</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Your email..">
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-25">
                           <label for="password">password</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="password" name="password" value="" placeholder="Your password..">
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-25">
                           <label for="cpass">Confirm Password</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="cpass" name="cpass" value="" placeholder="Your confirm Password..">
                        </div>
                     </div>
                     
                     <div class="row">
                        <button name="cancle" class="btn btn-primary"><a style="text-decoration: none;" href="./profile.php">Cancel</a></button>
                        <input type="submit" name="submit" value="Save Changes">
                     </div>
                  </form>
               </div>               


                
               </div> 
            </div>
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
    
</body>

</html>