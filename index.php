<?php
include ("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Media</title>

    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
<!--  Main Container -->
<div class="main_wrapper">

       <div class="header_wrapper">

            <div class="header_logo">
                <a href="index.php">
                    <img id="logo" src="images/icon-logo.png" >
                </a>
            </div> <!--Header Logo-->

            <div id="form">
                <form action="result.php" method="get" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Lakukan Pecarian..">
                    <input type="submit" name="search" value="Search">
                </form>
            </div>

            <div class="cart">
                <ul>
                    <li class="dropdown_header_cart">
                        <div id="notification_total_art" class="shopping-cart">
                            <img src="images/cart.png" id="cart_image">
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="register_login">
                <div class="login"><a href="index.php?action=login">Login</a></div>
                <div class="register"><a href="customer_register.php">Register</a></div>
            </div>

        </div><!--Header Wrapper-->

        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_services.php">All Services</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="content_wrapper">
           <div id="sidebar">

               <div id="sidebar_title">Kategori</div>
               <ul id="cats">
                <?php
                
                $get_cats = "select * from categories";
                $run_cats = mysqli_query($con, $get_cats);

                while($row_cats=mysqli_fetch_array($run_cats)) {

                    $cat_id = $row_cats['cat_id'];
                    $cat_title = $row_cats['cat_title'];
                    
                    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                };
                
                ?>

               </ul>

                <div id="sidebar_title">Partner</div>
                <ul id="cats">
                   
                <?php
                
                $get_brands = "select * from partner";
                $run_brands = mysqli_query($con, $get_brands);

                while($row_brands=mysqli_fetch_array($run_brands)) {

                    $brand_id = $row_brands['brand_id'];
                    $brand_title = $row_brands['brand_title'];
                    
                    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
                };
                
                ?>

                </ul>
           </div>

        </div><!--Content Wrapper-->
            
    <div id="footer">
    This is Footer
    </div><!--End Footer-->
</div><!-- End Main Wrapper-->
<!-- End Main Container -->
    
</body>
</html>