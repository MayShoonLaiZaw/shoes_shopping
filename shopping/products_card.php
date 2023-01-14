<?php
    require_once "checkCard.php";
    require_once "CheckId.php";
    require_once "Products.php";
    require_once "../assets/init/init.php";
    if(!isset($_SESSION['email'])) {
        echo "<script>location.href='../assets/SignIn.php';</script>";
    } 
    $products = new Products;
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Shoes Shopping</title>
        <link rel="stylesheet" href="css/products_card.css">
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="header flex-container">
                    <div class="header-logo-bars flex-container">
                        <div class="header-bars">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <div class="header-logo">
                            <figure>
                                <img src="./images/da7854c889578743810e7970ae28671f.png" alt="logo">
                            </figure>
                        </div>
                    </div>
                    <div class="nav-bar" id="nav">
                        <nav>
                            <ul class="nav-lists flex-container">
                                <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                                <li><a href="#"><i class="fa-solid fa-bag-shopping"></i>Popular</a></li>
                                <li><a href="#"><i class="fa-solid fa-person-running"></i>Update Products</a></li>
                                <li><a href="#"><i class="fa-solid fa-square-phone"></i>Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-social flex-container">
                        <div class="icon1">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
                        <div class="icon2">
                            <i class="fa fa-instagram"></i>
                        </div>
                        <div class="icon3">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="icon5" style="display:block">
                            <a href="../assets/SignOut.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section>
                <div class="container">
                    <div class="card-pay">
                        <h1>Lists of Products Card</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, dolorem rem rerum consectetur optio quas perferendis officiis iusto? Atque tempore nisi ut odit dicta corrupti culpa sint labore rerum officia. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus officiis libero, eius eveniet explicabo eos adipisci. Laboriosam odio vel ipsam repellat accusamus, fugit deleniti temporibus, iusto cum consectetur, reiciendis eum!</p>
                        <div class="list-products">
                            <table>
                                <thead>
                                    <tr>
                                        <th id="no">No.</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Remove</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <?php 
                                $allTotal = 0;
                                if(!empty($_SESSION['card'])){
                                    $total = 0;
                                    $i=1;
                                    foreach($_SESSION['card'] as $keys => $values){
                                        $total = $values['product_quantity'] * $values['product_price'];
                                        $allTotal += $total; 
                                        ?>
                                <tbody>
                                    <tr>
                                        <td class="product-id" data-id=<?php echo $i; ?>><?php echo $i;$i++?></td>
                                        <td><img src="uploads/<?php echo $values['product_img'] ?>"></td>
                                        <td><?php echo $values['product_name']; ?></td>
                                        <td class="product-price"><?php echo $values['product_price']; ?></td>
                                        <td id="product-quantity">1</td>
                                        <td>
                                            <div class="choose-button">
                                                <button type="submit" class="plus"><i class="fa-solid fa-plus"></i></button>
                                                <button type="submit" class="minus"><i class="fa-solid fa-minus"></i></button>
                                            </div>
                                        </td>
                                        <td id="total-product-price"><?php echo $total;?></td>
                                    </tr>
                                <?php
                                    }
                                    
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">All Total</td>
                                        <td id="product-alltotal"><?php echo $allTotal;?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="confirm-cancel flex-container">
                                <div class="cancel-btn">
                                    <form method="post">
                                        <?php 
                                            
                                            if($products->remove()){
                                                unset($_SESSION['card']);
                                                echo "<script>location.href='index.php'</script>";
                                            }
                                        ?>
                                        <button type="submit" id="remove-all" name="remove" disabled>Remove All</button>
                                    </form>
                                </div>
                                <div class="confirm-btn">
                                    <button type="submit" id="place-order" disabled>Place Order</button>
                                </div>
                            </div>
                            <div class="bg-color">
                                <h3>Choose One Cash Pay You Have...</h3>
                                <div class="place-cash flex-container">
                                    <div class="cash-icon">
                                        <input type="checkbox" id="check-1" class="check" value="1">
                                        <div class="cash-img">
                                            <label for="check-1">
                                                <img src="images/wave-money-android.png" alt="wave-money">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cash-icon">
                                        <input type="checkbox" id="check-2" class="check" value="2">
                                        <div class="cash-img">
                                            <label for="check-2">
                                                <img src="images/unnamed.png" alt="kbz-pay">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cash-icon">
                                        <input type="checkbox" id="check-3" class="check">
                                        <div class="cash-img">
                                            <label for="check-3">
                                                <img src="images/cli_logo18.png" alt="aya-bank">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="place-cash-button">
                                    <?php 
                                        unset($_SESSION['card']);
                                    ?>
                                    <button type="submit" id="select" disabled>Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="bg-color1">
                <div class="container">
                    <div class="summary">
                        <div class="summary-logo-icon flex-container">
                            <div class="summary-logo">
                                <div class="summary-logo-img">
                                    <img src="images/da7854c889578743810e7970ae28671f.png" alt="logo">
                                </div>
                            </div>
                            <div class="summary-icons flex-container">
                                <div class="summary-social-icon">
                                    <i class="fa-brands fa-facebook"></i> 
                                </div>
                                <div class="summary-social-icon">
                                    <i class="fa fa-instagram"></i>
                                </div>
                                <div class="summary-social-icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </div>
                        </div>
                        <div class="summary-copy-nav flex-container">
                            <div class="copy-para">
                                <p>&copy; 2022-2023 Created By ZShadow. All Right Reserved.</p>
                            </div>
                            <div class="summary-nav">
                                <nav>
                                    <ul class="flex-container">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="#">Popular</a></li>
                                        <li><a href="#">Update Products</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="copy-para2">
                                <p>&copy; 2022-2023 Created By ZShadow. All Right Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/3399965b27.js" crossorigin="anonymous"></script>
        <script src="js/products_card.js"></script>
        
    </body>
</html>