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
                <td><select name="product_cat" id="">
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

            <tr>
                <td align="right"><b>Product Partner:</b></td>
                <td><select name="product_cat" id="">
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
                <td align="right"><b>Product Category:</b></td>
                <td><input type="file" name="product_image"></td>
            </tr>

            <tr>
                <td align="right"><b>Product Price:</b></td>
                <td><input type="text" name="product_price"></td>
            </tr>

            <tr>
                <td align="right"><b>Product Description:</b></td>
                <td><textarea name="prduct_desc" id="" cols="20" rows="10"></textarea></td>
            </tr>

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