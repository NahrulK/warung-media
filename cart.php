<?php
include ('includes/header.php');
?>

<style>

.cart .shopping-cart .noti-cart-number {
    background: #7e7204;
    color: #fff;
    position: absolute;
    top: -5px;
    left: 25px;
    padding: 1px 3px 1px 3px;
    border-radius: 50%;
}


.shopping_chart_container input[type=submit], .shopping_chart_container button  {
    background: #0c5f66;
    color: #fff;
    padding : 5px 10px;
    border : 0.1px solid rgba(27,175,224, 1);
}

.shopping_chart_container input[type=submit]:hover, .shopping_chart_container button :hover {
    background: #042c30;
} 

.shopping_chart_container button a{
    text-decoration: none; color: #fff;

}

.shopping_cart {
    background : #4181175d;

}

</style>
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Services</a></li>
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

                <div class="shopping_chart_container" >

                
                    <div class="shopping_cart" align="right" style="padding: 15px;">

                        <?php
                        
                        if(isset($_SESSION['customer_email'])) {
                            echo "<b> Your Email </b> ". $_SESSION['customer_email'];
                        }else{
                            echo "";
                        }

                        ?> 

                        <b style="color: navy; "> Keranjang anda - </b> berisi : <?php total_items(); ?> dengan total harga <?php echo total_price();?>

                    </div> <!-- Shopping Chart -->


                        <form action="" method="post" enctype="multipart/form-data">
                        <table align="center" width="100%">

                            <tr align="center">
                                <th>Remove</th>
                                <th>Product</th>
                                <th>quality</th>
                                <th>Price</th>
                            </tr>
    <?php
        $total = 0;
        $ip = get_ip();

        $run_cart = mysqli_query($con, "SELECT * from cart where ip_address='$ip'");

        while($fetch_cart = mysqli_fetch_array($run_cart)){
            
            $product_id = $fetch_cart['product_id'];

            $result_product = mysqli_query($con, "SELECT * from product where product_id='$product_id'");

            while ($fetch_product = mysqli_fetch_array($result_product)){

                $product_price = array($fetch_product['product_price']);
                $product_title = $fetch_product['product_title'];
                $product_image = $fetch_product['product_image'];
                $sing_price = $fetch_product['product_price'];
                $values = array_sum($product_price);

                // Getting quality produduct

                $run_qty = mysqli_query($con, "SELECT * from cart where product_id='$product_id' AND ip_address='$ip'");

                $row_qty = mysqli_fetch_array($run_qty);

                $qty = $row_qty['quality'];

                $values_qty = $values * $qty;

                $total += $values_qty;


        ?>

                            <tr align="center">
                                <th><input type="checkbox" name="remove[]" value="<?php echo $product_id ?>"></th>
                                <th><?php echo $product_title; ?>
                                <br/>
                                <img src="admin_area/product_images/<?php echo $product_image ?>" width='100' height='100'>
                                </th>
                                <th><input type="text" size="4" name="qty" value="<?php echo $qty;?>"></th>
                                <th><?php echo $sing_price; ?></th>
                            </tr>

                            <?php }} // end while ?>

                            <tr>
                                <td colspan="4" align="right"><b>Sub Total: </b></td>
                                <td><?php echo total_price(); ?></td>
                            </tr>

                            <tr ailgn="center">
                                <td colspan="2" > <input type="submit" value="Update Cart" name="update_cart"></td>
                                
                                <td> <input type="submit" value="Continue Shopping" name="continue"></td>

                                <td><button> <a href="checkout.php" > Checkout</a></button></td>
                            </tr>

                        </table>
                        </form>

                        <?php
                        
                        if(isset($_POST['remove'])){
                            foreach($_POST['remove'] as $remove_id){
                              
                                $run_delete = mysqli_query($con, "DELETE from cart where product_id='$remove_id' AND ip_address='$ip'");

                            if($run_delete){
                                echo "<script>window.open('cart.php', '_self')</script>";
                            }


                            }
                        }

                        if(isset($_POST['continue'])){
                            echo "<script>window.open('index.php', '_self')</script>";
                        }
                        
                        ?>

                </div> <!-- Shopping Cart Container -->
               

               <div id="product_box">

                
                
                               
               </div>
           </div>

        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>