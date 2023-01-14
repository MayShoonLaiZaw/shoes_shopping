<?php
require_once "../assets/init/init.php";
require_once "Products.php";
$products = new Products;

if(isset($_POST['card'])) {
    if(isset($_SESSION['card'])) {
        $product_card_id = array_column($_SESSION['card'],"product_id");
        if(!in_array($_GET['id'],$product_card_id)) {
            $count = count($_SESSION['card']);
            $product_card = array(
                "product_id" => $_GET['id'],
                "product_img" => $_POST['product_img'],
                "product_name" => $_POST['product_name'],
                "product_price" =>$_POST['price'],
                "product_quantity" => $_POST['quantity'],
            );
            $_SESSION['card'][$count] = $product_card;
            echo "<script>location.href='index.php';</script>";
        } else {
            echo "<p>Product Already Added!</p>";
            echo "<script>location.href='index.php';</script>";
        }
    }
    else {
        $product_card = array(
            "product_id" => $_GET['id'],
            "product_img" => $_POST['product_img'],
            "product_name" => $_POST['product_name'],
            "product_price" =>$_POST['price'],
            "product_quantity" => $_POST['quantity'],
        );
        $_SESSION['card'][0] = $product_card;
        echo "<script>location.href='index.php';</script>";
    }
}
?>