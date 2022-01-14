<style>


.login_box {
    width: 100%;
    height: 100px;
    background: #fff;
    padding: 15px;
}

.login_box input[type=text],
.login_box input[type=password] {
    width: 60%;
    padding: 3px 10px;
    margin: 5px 0;
}

.login_box input[type=submit]{
    padding : 10px 15px;
    background :#f3f3f3;
    border: 0.01px solid;
}

</style>


<div class="login_box">

    <form action="" method="post">

    <table align="left" width="70%">

    <tr align="left">
        <td colspan="4">
            <h2>Login</h2><br>
            <span>
                Dont have account? <a href="customer_register.php">Register Here</a><br><br>
            </span>
        </td>
    </tr>

    <tr>
        <td width="15%"><b>Email :</b></td>
        <td colspan="3"><input type="text" name="email" placeholder="E-mail"></td>
    </tr>

    <tr>
        <td width="15%"><b>Password :</b></td>
        <td colspan="3"><input type="password" name="password" placeholder="Password"></td>
    </tr>

    <tr align="left">
        <td></td>
        <td colspan="4">
            <a href="checkout.php?forgot_pass">
                Forgot Password?
            </a>
        </td>
    </tr>

    <tr align="left">
        <td></td>
        <td colspan="4">
            <input type="submit" value="Login" name="login">
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

