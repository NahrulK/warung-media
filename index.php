<?php
include ("functions/functions.php");
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
                    getCats();                               
                ?>

               </ul>

                <div id="sidebar_title">Partner</div>
                <ul id="cats">
                   
                <?php
                    getPartner();
                ?>

                </ul>
           </div>

           <div id="content_area">
               <div id="product_box">

                
                <?php
                getPro()
                ?>
                            
                <?php
                getProByCat();                                
                ?> <!--Sort berdasarkan category-->

                <?php
                getProByBrand();                       
                ?> <!--Sort berdasarkan brand-->
                               
               </div>
           </div>

        </div><!--Content Wrapper-->
            
    <div id="footer">
    <h2 style="text-align : center; padding-top: 30px;">&copy; 2022 - <?php echo date("Y");?> by @nahrul.k</h2>
    </div><!--End Footer-->
</div><!-- End Main Wrapper-->
<!-- End Main Container -->
    
</body>
</html>