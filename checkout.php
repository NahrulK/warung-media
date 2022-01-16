<?php
include ('includes/header.php');
?>
        
        <div class="content_wrapper">
           
                        
                <?php 
                
                if(!isset($_SESSION['user_id'])){
                    include('login.php');
                }else {
                    include('payment.php');
                }

                echo $_SESSION['user_id'];
                echo $_SESSION['role'];
                
                ?>
                              
            
        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>