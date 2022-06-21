<?php
 session_start(); 
include "./includes/connection.php";

if(!isset($_SESSION['username'])){
    echo "<script>alert('You have to create account or login first...')</script>";
    echo "<script>window.location = './index.php'</script>";
  }

if (isset($_POST['remove'])) {
    //print_r($_GET['id']);

    
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_POST['pid']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed...')</script>";
                echo "<script>window.location = './cart.php'</script>";
            }
        }
    
    
}
if (isset($_POST['quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_POST['pid']) {
                $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
                //print_r($_SESSION['cart']);
                echo "<script>window.location = './cart.php'</script>";
            }
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
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/cart.css">
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
                    <h1 class = "lg-title">Cart</h1> 
                     <div class="small-container cart-page">
                        
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>                            
                            <th>Subtotal</th>
                        </tr>
                        <?php 
                        //$total = 0;
                        if (isset($_SESSION['cart'])) {
                        
                            $product_id = array_column($_SESSION['cart'], 'product_id');

                            $sql = "SELECT * FROM product";
                            $result = mysqli_query($conn,  $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    if ($row['id'] == $value['product_id']) {
                                        
                                            
                                        ?>

                            <form action="./cart.php" method="POST">

                            <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="./Admin/Admin/images/<?php echo $row['image']?>" alt="">
                                    <div class="info">
                                        <p class="pname"><?php echo $row['name'].' (Code: '. $row['code'].' )'?></p>
                                        <small>Price:৳ <?php echo $row['price']?><input type="hidden" id="iprice" value="<?php echo $row['price']?>"></small>
                                        <br>
                                        <button type="submit" name="remove" class="btn btn-primary">Remove</button>
                                    </div>
                                </div>
                            </td>
                            <form action="./cart.php" method="POST">
                            <td><input type="number" name="quantity" onchange="this.form.submit()" id="iquantity" value="<?php echo $value['quantity'] ?>" min="1" max="10"></td>
                            <input type="hidden" id="pid" name="pid" value="<?php echo $row['id']?>">
                            </form>
                            <td id="itotal"></td>
                        </tr>
                        </form>

                                        <?php

                                        //$total = $total + (int)$row['price'];
                                    
                                    }
                                }

                             }

                            }else{
                                echo "<h5>Cart is Empty</h5>";
                            }



                         ?>  
                    </table>
                    
                    <div class="total-price">
                        <table>
                            <?php 
                            if (isset($_SESSION['cart'])) {
                         ?>
                            <tr>
                                <td>Product</td>
                                <td><?php $count = count($_SESSION['cart']);
                                    echo $count." Items"; ?></td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td id="gtotal"></td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>35.00</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td id="totalwithtax"></td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="./placeorder.php">
                                        <input type="hidden" class="total2" value="">
                                        <button type="submit" name="placeorder" class="btn btn-primary">Confirm Order</button>
                                    </form>
                                </td>
                            </tr>

                            



                        <?php }else{
                            ?>
                            <tr>
                                <td>Product</td>
                                <td>0 Items</td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td>৳0</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>৳0</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>৳0</td>
                            </tr>
                        <?php } ?>


                        </table>
                    </div>
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


    <script type="text/javascript">
        
        var iprice = document.querySelectorAll('#iprice');
        var iquantity = document.querySelectorAll('#iquantity');
        var itotal = document.querySelectorAll('#itotal');
        var gtotal = document.querySelector('#gtotal');
        var totalwithtax = document.querySelector('#totalwithtax');
        var total2 = document.querySelector('.total2');

        function subtotal(){
            var gt = 0;
            for (var i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
                gt = gt + (iprice[i].value)*(iquantity[i].value);
            }

            gtotal.innerText = gt;
            totalwithtax.innerText = gt+35;
            total2.value = gt+35;

        }

        subtotal();
        
    </script>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/app.js"></script>
    
</body>

</html>