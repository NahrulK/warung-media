<?php
include ('includes/header.php');
?>
       
        <div class="content_wrapper">

            <?php  if(!isset($_GET['action'])) { ?>

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
                               
                <?php getPro() ?>     
                <?php getProByCat(); ?> <!--Sort berdasarkan category-->
                <?php getProByBrand(); ?> <!--Sort berdasarkan brand-->                           
                
               </div>
           </div>

        <?php }else { ?>

        <?php include('login.php'); } ?>

        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>