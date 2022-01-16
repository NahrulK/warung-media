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
        <td colspan="3"><input type="text" name="name" required placeholder="Name here.."></td>
    </tr>
    
    <tr>
        <td width="15%"><b>Email :</b></td>
        <td colspan="3"><input type="text" name="email" required placeholder="E-mail"></td>
    </tr>

    <tr>
        <td width="15%"><b>Password :</b></td>
        <td colspan="3"><input type="password" name="password" required placeholder="Password" id="password_confirm1"></td>
    </tr>

    <tr>
        <td width="15%"><b>Confirm Password :</b></td>
        <td colspan="3"><input type="password" name="confirm_password" required placeholder="Confirm Password" id="password_confirm2">
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
        <td colspan="3"><input type="text" name="city" required placeholder="Masukan Kota"></td>
    </tr>

    <tr>
        <td width="15%"><b>Contact:</b></td>
        <td colspan="3"><input type="text" name="contact" required placeholder="Contact"></td>
    </tr>

    <tr>
        <td width="15%"><b>Address: </b></td>
        <td colspan="3"><input type="text" name="address" required placeholder="Masukan Alamat.."></td>
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

if(isset($_POST['register'])){

    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])) {

       $ip = get_ip();
       $name = $_POST['name'];
       $email = trim($_POST['email']);
       $password = trim($_POST['password']);
       $hash_password = md5($password);
       $confirm_password = trim($_POST['confirm_password']);
       
       $image = $_FILES['image'] ['name'];
       $image_tmp = $_FILES['image'] ['tmp_name'];
       $country = $_POST['country'];
       $city = $_POST['city'];
       $contact = $_POST['contact'];
       $address = $_POST['address'];

    //    $check_exist = mysqli_query($con, "SELECT * from users where email='$email'");

       $check_data_email = mysqli_query($con, "SELECT * from users where email='$email'");

       $email_count = mysqli_num_rows($check_data_email);

       $row_register = mysqli_fetch_array($check_data_email);

       if($email_count > 0) {
           echo "<script> alert('Email $email sudah terdafar')</script>";
       }elseif($password != $confirm_password) {
           echo "<script> alert('Password anda tidak sama!')</script>";
       }elseif($row_register['email'] != $email && $password == $confirm_password) {
           
            move_uploaded_file($image_tmp, "customer/customer_image/$image");

            $run_insert = mysqli_query($con, "insert into users (ip_address,name,email,password,country,city,contact,user_address,image) values ('$ip','$name','$email','$hash_password','$country','$city','$contact','$address','$image')");

       }

       if ($run_insert) {
           $sel_user = mysqli_query($con, "SELECT * from users where email='$email'");
           $row_user = mysqli_fetch_array($sel_user);

           $_SESSION['user_id'] = $row_user['id'];
           $_SESSION['role'] = $row_user['role'];
       }

       $run_chart = mysqli_query($con, "SELECT * from cart where ip_address='$ip'");
       $check_chart = mysqli_num_rows($run_chart);

       if($check_chart == 0) {
           $_SESSION['email'] = $email;

           echo "<script style='color=green;'>alert('Akun berhasil dibuat')</script>";
           echo "<script> window.open('customer/my_account.php', '_self') </script>";
       } else {
            $_SESSION['email'] = $email;

           echo "<script style='color=green;'>alert('Akun berhasil dibuat')</script>";
           echo "<script> window.open('checkout.php', '_self') </script>";
       }

    }
}

    

?>

  
        
        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>