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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./product_style.css">
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
            <div class = "products">
            <div class = "container">
                

                <button type = "button" class = "btn-edit"><a style="text-decoration: none;color: white;" href="./productform.php">Add Product<span><i class = "fas fa-plus"></i></span></a> 
                                    
                                </button>

                <div class = "product-items">
                    <?php 
          $sql = "SELECT * FROM product ORDER BY id ASC";
          $result = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {  ?>
                    <!-- single product -->
                    <form method="post" >
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "images/<?php echo $row['image']?>" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <button type = "button" class = "btn-edit"><a style="text-decoration: none;color: white;" href="./hide.php?id=<?php echo $row['id']."&active=".$row['active']?>"> <?php echo $row['active']?>
                                    <span><i class = "fas fa-edit"></i></span></a>
                                </button>
                                <button type = "button" class = "btn-remove"><a style="text-decoration: none;color: black;" href="./remove.php?id=<?php echo $row['id']?>"> remove
                                    <span><i class = "fas fa-trash"></i></span></a>
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
                            <p class = "product-price">৳ <?php echo $row['price']?></p>
                        </div>

                        
                    </div>
                    <!-- end of single product -->
                    </form>
                    <?php } }?>
                </div>
            </div>
        </div>

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