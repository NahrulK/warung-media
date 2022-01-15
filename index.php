<?php
include ('includes/header.php');
?>
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Services</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
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


                <?php
                
                cart();

                ?>

               <div id="product_box">


               <?php if(!isset($_GET['action'])) { ?>
                
                <?php getPro() ?>     
                <?php getProByCat(); ?> <!--Sort berdasarkan category-->
                <?php getProByBrand(); ?> <!--Sort berdasarkan brand-->
                               
                <?php }else { ?>

                    <?php include('login.php'); ?>

                <?php } ?>
               </div>
           </div>

        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>