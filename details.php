<?php
include ('includes/header.php');
?>
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
                
                if(isset($_GET['pro_id'])){
                    $product_id = $_GET['pro_id'];

                    $run_query_by_pro_id = mysqli_query($con, "SELECT * from product where product_id='$product_id'");

                    while ($row_pro = mysqli_fetch_array($run_query_by_pro_id)) {
                        
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
                            <a href='index.php?add_cart=$pro_id'>
                                <button style='float:right'> Add to Chart</button>
                            </a>
                        </div>
                        ";
                    }
                }
                
                ?>

               </div>
           </div>

        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>