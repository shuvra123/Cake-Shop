<?php 
  ob_start();
  session_start();
  include "../connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>
<body>

    <!-- wrapper start -->
    <div class="wrapper">
        <!-- header menu start -->
        <div class="header">
            <div class="header-menu">
                <div class="title">Fresh <span>Meal</span></div>
                <div class="sidebar-btn">
                <i class="fas fa-bars"></i>
                </div>
                <ul>
                    
                    <li><a href="./logout.php"><i class="fas fa-power-off"></i></a></li>
                </ul>

            </div>

        </div>
        <!-- header menu end -->
        <!-- sidebar start -->
        <div class="sidebar">
            <div class="sidebar-menu">
                <center class="profile">
                    <img src="Shuzuika.jpeg" alt="">
                    <p><?php echo $_SESSION['admin_username']; ?></p>
                </center>
                <li class="item">
                    <a href="./index.php" class="menu-btn">
                        <i class="fas fa-desktop"></i><span>Dashboard</span>
                    </a>
                </li>
<
                <li class="item">
                    <a href="./product.php" class="menu-btn">
                        <i class="fab fa-product-hunt"></i><span>Products</span>
                    </a>
                </li>
                <!-- <li class="item" id="messages">
                    <a href="#messages" class="menu-btn">
                        <i class="fas fa-envelope"></i><span>Messages</span>
                    </a>
                    
                </li> -->
                <li class="item">
                    <a href="./order.php" class="menu-btn">
                        <i class="fas fa-shopping-cart"></i><span>Orders</span>
                    </a>
                </li>

            </div>
        </div>
        <!-- sidebar end -->
        <!-- main container start -->
        <div class="main-container">
            
        </div>
        <!-- main container end -->

        
    </div>
    <!-- wrapper end -->
    <script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-btn").click(function(){
            console.log("test");
            $(".wrapper").toggleClass("collapse");
        });
    });

    </script>
    
</body>
</html>