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
           
                        
                <?php 
                
                if(!isset($_SESSION['email'])){
                    include('login.php');
                }else {
                    include('payment.php');
                }
                
                ?>
                              
            
        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>