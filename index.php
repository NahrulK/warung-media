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
               <div id="products">

                
                <?php
                
                $get_pro = "SELECT * from product order by RAND() LIMIT 0,6";
                $run_pro = mysqli_query($con, $get_pro);

                while($row_pro = mysqli_fetch_array($run_pro)) {

                    $pro_id = $row_pro['product_id'];
                    $pro_cat = $row_pro['product_cat'];
                    $pro_brand = $row_pro['product_brand'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];

                    echo "
                    <div id='single_product'>
                        <h3>$pro_title</h3>
                        <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                        <p><b>Price : $pro_price</b></p>
                        <a href='details.php?pro_id=$pro_id'>Details</a>
                        <a href='details.php?add_cart=$pro_id'>
                            <button style='float:right'> Add to Chart</button>
                        </a>
                    </div>
                    ";


                };

                ?>
                
                

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