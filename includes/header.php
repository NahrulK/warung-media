<?php
session_start();
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
    <script src="js/jquery.js"></script>

<style>
#profile img {
    width: 27px;
    height: 27px;
    position: relative;
    /* top : 13px; */
    left: -20px;
    border-radius: 50%;
}

#profile ul {
    decoration : none;
    list-style: none;
    position: relative;
}

#profile ul a {
    text-decoration: none;
    color: #000;
    line-height: 35px;
}

#profile ul a:hover {
    text-decoration : underline;
}

#profile ul li ul {
    position: absolute;
    top: 40px;
    right: 1px;
    white-space: nowrap;
    background: #fff;
    width: auto;
    z-index: 11;
    display: none;
}

#profile ul li ul li a {
    padding : 2px 25px 2px 15px;
}

#profile {
    float: left;
    height: 35px;
    line-height: 35px;
    position: relative;
    top: 15px;
    margin-left: 35px;
}

</style>

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
                            <div class="noti_cart_number" style="background: #0c5f66; color: #fff; position: absolute; top: -5px; left: 40px; padding: 1px 3px 1px 3px; border-radius: 100%;">
                               
                            <?php

                            total_items();                           

                            ?>


                            </div><!-- Cart Number-->
                        </div>
                    </li>
                </ul>
            </div>

            <?php if(!isset($_SESSION['user_id'])) { ?>
            
            <div class="register_login">
                <div class="login"><a href="index.php?action=login">Login</a></div>
                <div class="register"><a href="register.php">Register</a></div>
            </div>

            <?php }else {?>


                <?php
                
                $select_user = mysqli_query($con, "SELECT * from users where id='$_SESSION[user_id]'");
                $data_user = mysqli_fetch_array($select_user);
                
                ?>

                <div id="profile">

                <ul>
                    <li class="dropdown_header">

                        <a href="">
                            <?php  if($data_user['image'] != '') { ?>

                            <span><img src="customer/customer_image/<?php echo $data_user['image']; ?>" alt=""></span>

                            <?php }else { ?>

                            <span><img src="images/git.png" alt=""></span>

                            <?php } ?>
                        </a>

                        <ul class="dropdown_menu_header">
                            <li><a href="my_account.php"> Account Setting</a></li>
                            <li><a href="logout.php"> Logout</a></li>
                        </ul>

                    </li>
                </ul>

                </div>

            <?php } ?>

        </div><!--Header Wrapper-->



        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Services</a></li>
                <li><a href="my_account.php">My Account</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div> <!-- Menu bar -->

<?php include("js/drop_down_menu.php"); ?>   