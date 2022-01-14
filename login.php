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

    echo $_POST['email']. "<br>";

    echo $_POST['password'];
}

?>