<?php
include ("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambahkan Jasa</title>
</head>
<body>

    <form action="insert_jasa.php" method="post" enctype="multipart/form-data">

        <table align="center" width="795px" border="2" >
            <tr align="center">
                <td colspan="7"><h2>Tambahkan Data disini</h2></td>
            </tr>
            <tr>
                <td align="right"><b>Product Title:</b></td>
                <td><input type="text" name="product_title" size="60" required></td>
            </tr>
            <tr>
                <td align="right"><b>Product Category:</b></td>
                <td><select name="product_cats" id="">
                    <option>Select Category</option>
                    <?php
                    
                    $get_cats = "select * from categories";
                    $run_cats = mysqli_query($con, $get_cats);

                    while($row_cats=mysqli_fetch_array($run_cats)) {

                        $cat_id = $row_cats['cat_id'];
                        $cat_title = $row_cats['cat_title'];
                        
                        echo "<option value='$cat_id'>$cat_title</option>";
                    };
                    
                    ?>
                </select></td>
            </tr>
                    <!--  -->
            <tr>
                <td align="right"><b>Product Partner:</b></td>
                <td><select name="product_brand" id="">
                    <option>Select Partner</option>
                    <?php
                    
                    $get_brands = "select * from partner";
                    $run_brands = mysqli_query($con, $get_brands);

                    while($row_brands=mysqli_fetch_array($run_brands)) {

                        $brand_id = $row_brands['brand_id'];
                        $brand_title = $row_brands['brand_title'];
                        
                        echo "<option value='$brand_id'>$brand_title</option>";
                    };
                    
                    ?>
                </select></td>
            </tr>

            <tr>
                <td align="right"><b>Product images:</b></td>
                <td><input type="file" name="product_image"></td>
            </tr>
                    <!--  -->
            <tr>
                <td align="right"><b>Product Price:</b></td>
                <td><input type="text" name="product_price"></td>
            </tr>
                    <!--  -->
            <tr>
                <td align="right"><b>Product Description:</b></td>
                <td><textarea name="product_desc" id="" cols="20" rows="10"></textarea></td>
            </tr>
                    <!--  -->
            <tr>
                <td align="right"><b>Product Keyword:</b></td>
                <td><input type="text" name="product_keywords"></td>
            </tr>

            <tr align="center">
                    <td colspan="7"><input type="submit" name="insert_post" value="Masukan Kedalam Daftar!"></td>
            </tr>

        </table>

    </form>
    
</body>
</html>

<?php

if (isset($_POST['insert_post'])){
    $product_title = $_POST['product_title'];
    $product_cats = $_POST['product_cats'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = trim(mysqli_real_escape_string($con,$_POST['product_desc']));

    // Menggambil Images field
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp, "product_images/$product_image");

    $insert_product = "insert into product (product_cat,product_brand,product_title,product_price,product_desc, product_image, product_keywords) values ('$product_cats','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

    $insert_pro = mysqli_query($con, $insert_product);

    if($insert_pro) {

        echo "<script> alert('Product berhasil Ditambahkan')</script>" ;
        echo "<script>window.open('index.php?insert_product', 'self')</script>" ;

    }

}

?>