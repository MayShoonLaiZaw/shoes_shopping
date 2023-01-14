<?php
    require_once "Products.php";
    require_once "../assets/init/init.php";
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Shoes Shopping</title>
        <link rel="stylesheet" href="css/products_input.css">
    </head>
    <body>
    <main>
        <div class="container">
            <?php
                $products = new Products;
                if($products->product_input($_POST,$_FILES)) {
                    echo "<script>location.href='index.php';</script>";
                }
            ?>
            <div class="products-input">
                <h1>Products Input Collections</h1>
                <form method="post" enctype="multipart/form-data">
                    <div class="input-data">
                        <input type="file" name="img" id="img" accept="image/*">
                        <input type="text" name="product_name" placeholder="Product Name">
                        <input type="text" name="product_description" placeholder="Product Description">
                        <input type="number" name="price" placeholder="Price">
                        <div class="input-btn">
                            <button type="submit" name="add">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3399965b27.js" crossorigin="anonymous"></script>
        
    </body>
</html>