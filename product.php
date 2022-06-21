<?php
 session_start(); 
include "./includes/connection.php";


if (isset($_POST['add'])) {

    if (isset($_SESSION['username'])) {
        if (isset($_SESSION['cart'])) {
        
        $item_array_id = array_column($_SESSION['cart'], 'product_id');

        //print_r($item_array_id);

        if (in_array($_POST['pid'], $item_array_id)) {

            echo "<script>alert('Product already added')</script>";
            echo "<script>window.location = './product.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array('product_id' => $_POST['pid'],'price'=>$_POST['pprice'],'pcode' => $_POST['pcode'],'quantity'=>1);
            $_SESSION['cart'][$count]=$item_array;
            //print_r($_SESSION['cart']);
        }

        
    }else{

        $item_array = array('product_id' => $_POST['pid'],'price'=>$_POST['pprice'],'pcode' => $_POST['pcode'],'quantity'=>1);

        $_SESSION['cart'][0]=$item_array;
        //print_r($_SESSION['cart']);


    }
    }else
    {
        echo "<script>alert('You have to create account or login first...')</script>";
    echo "<script>window.location = './index.php'</script>";
    }

    //print_r($_POST['pid']);


    
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

                <div class = "products">
            <div class = "container">
                <h1 class = "lg-title">Special Foods With Special Offers</h1>
                <p class = "text-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla vel ullam incidunt, perspiciatis velit. Maiores ad repellat, dicta architecto quis corporis ratione eligendi laborum nulla itaque sint porro magnam animi.</p>

                <div class = "product-items">
                    <?php 
          $sql = "SELECT * FROM product ORDER BY id ASC";
          $result = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {  ?>
                    <!-- single product -->
                    <form action="./product.php" method="post" >
                    <div class = "product"  id="<?php echo $row['active'] ?>">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "./Admin/Admin/images/<?php echo $row['image']?>" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <button type = "submit" name="add" class = "btn-cart"> add to cart
                                    <span><i class = "fas fa-plus"></i></span>
                                </button>
                                <button type = "submit" name="add" class = "btn-buy"> buy now
                                    <span><i class = "fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "sm-title"></h2>
                                <div class = "rating">
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "far fa-star"></i></span>
                                </div>
                            </div>
                            <a href = "#" class = "product-name"><?php echo $row['name'].' (Code: '. $row['code'].' )'?></a>
                            
                            <input type="hidden" name="pname" value="<?php echo $row['name']?>">
                            <input type="hidden" name="pcode" value="<?php echo $row['code']?>">
                            <input type="hidden" name="pid" value="<?php echo $row['id']?>">
                            <input type="hidden" name="pprice" value="<?php echo $row['price']?>">

                            <p class = "product-price">৳ <?php echo $row['price']?></p>
                        </div>

                        
                    </div>
                    <!-- end of single product -->
                    </form>
                    <?php } }?>
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