<?php
include ('includes/header.php');
?> <!-- Header -->
        
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
           </div> <!-- Sidebar -->

           <div id="content_area">
               <div id="product_box">

                
                <?php
                
                $get_pro = "SELECT * from product ";
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
                        <a href='index.php?add_cart=$pro_id'>
                            <button style='float:right'> Add to Chart</button>
                        </a>
                    </div>
                    ";


                }
                

                ?>
                            
                <?php
                getProByCat();                                
                ?> <!--Sort berdasarkan category-->

                <?php
                getProByBrand();                       
                ?> <!--Sort berdasarkan brand-->
                               
               </div>
           </div> <!-- Content Area -->
        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>