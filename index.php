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
                    <img id="logo" src="images/icon-logo.png" width="100px">
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
        </div><!--Header Wrapper-->

        <div class="content_wrapper">
            Content Wrapper
        </div><!--Content Wrapper-->
            
    <div id="footer">
    This is Footer
    </div><!--End Footer-->
</div><!-- End Main Wrapper-->
<!-- End Main Container -->
    
</body>
</html>