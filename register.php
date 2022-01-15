<style>

.register_box {
    width: 100%;
    height: 100px;
    background: #fff;
    padding: 15px;
}

.register_box input[type=text],
.register_box input[type=password] {
    width: 60%;
    padding: 3px 10px;
    margin: 5px 0;
}

.register_box input[type=submit]{
    padding : 10px 15px;
    background :#f3f3f3;
    border: 0.01px solid;
}

.register_box select {

    width: 40%;
    padding: 3px 10px;
    margin: 5px 0px;

}

.register_box input[input=file]{
    margin: 5px;
}

</style>


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

        <script>

        $(document).ready(function(){

           $("#password_confirm2").on('keyup',function(){


           let password_confirm1 = $("#password_confirm1").val();
           let password_confirm2 = $("#password_confirm2").val();

        //    alert(password_confirm2);

        if (password_confirm1 == password_confirm2) {
            $("#status_for_confirm_password").html('<strong style="color: green;">Password Sama</strong>');
        }else {
            $("#status_for_confirm_password").html('<strong style="color: red;">Password tidak sama..</strong>');
        }

           });
        });

        </script>
           
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
        <td width="15%"><b>Name :</b></td>
        <td colspan="3"><input type="text" name="name" placeholder="Name here.."></td>
    </tr>
    
    <tr>
        <td width="15%"><b>Email :</b></td>
        <td colspan="3"><input type="text" name="email" placeholder="E-mail"></td>
    </tr>

    <tr>
        <td width="15%"><b>Password :</b></td>
        <td colspan="3"><input type="password" name="password" placeholder="Password" id="password_confirm1"></td>
    </tr>

    <tr>
        <td width="15%"><b>Confirm Password :</b></td>
        <td colspan="3"><input type="password" name="confirm_password" placeholder="Confirm Password" id="password_confirm2">
            <p id="status_for_confirm_password">

            </p> <!--Menampilkan Validasi Password-->
        </td>
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