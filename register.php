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
           
        <div class="register_box">

    <form action="" method="post" enctype="multipart/form-data"> 

    <table align="left" width="70%">

    <tr align="left">
        <td colspan="4">
            <h2>Register</h2><br>
            <span>
                Already have account? <a href="index.php?action=login">Login Here</a><br><br>
            </span>
        </td>
    </tr>

    <tr>
        <td width="15%"><b>Email :</b></td>
        <td colspan="3"><input type="text" name="email" placeholder="Name here.."></td>
    </tr>
    
    <tr>
        <td width="15%"><b>Email :</b></td>
        <td colspan="3"><input type="text" name="email" placeholder="E-mail"></td>
    </tr>

    <tr>
        <td width="15%"><b>Password :</b></td>
        <td colspan="3"><input type="password" name="password" placeholder="Password"></td>
    </tr>

    <tr>
        <td width="15%"><b>Image :</b></td>
        <td colspan="3"><input type="file" name="image"></td>
    </tr>

    <tr>
        <td width="15%"><b>Country :</b></td>
        <td colspan="3">
            <?php include('includes/country_list.php'); ?>
        </td>
    </tr>

    <tr>
        <td width="15%"><b>City :</b></td>
        <td colspan="3"><input type="text" name="city" placeholder="Masukan Kota"></td>
    </tr>

    <tr>
        <td width="15%"><b>Contact:</b></td>
        <td colspan="3"><input type="text" name="contact" placeholder="Contact"></td>
    </tr>

    <tr>
        <td width="15%"><b>Address: </b></td>
        <td colspan="3"><input type="text" name="address" placeholder="Masukan Alamat.."></td>
    </tr>



    <tr align="left">
        <td></td>
        <td colspan="4">
            <input type="submit" value="Register" name="register">
        </td>
    </tr>

    </table>

    </form>


</div>

<?php

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST [ 'password'];

    $run_login = mysqli_query($con, "SELECT * from users where password='$password' AND email='$email'");

    $check_login = mysqli_num_rows($run_login);

    if($check_login == 0) {
        echo "<script>alert('Password atau email yang anda masukan salah, Coba Lagi')</script>";
        exit();
    }

    $ip = get_ip();

    $run_chart = mysqli_query($con, "SELECT * from cart where ip_address='$ip'");

    $check_cart = mysqli_num_rows($run_chart);

    if($check_login > 0  AND $check_cart == 0){

        $_SESSION['email'] = $email;

        echo "<script>alert('Anda berhasil Login')</script>";
        echo "<script>window.open('customer/my_account.php', '_self')</script>";
    } else {
        $_SESSION['email'] = $email;

        echo "<script>alert('Anda berhasil Login')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";        

    }

}

?>

  
        
        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>