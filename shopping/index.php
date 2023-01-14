<?php
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
        <link rel="stylesheet" href="css/index.css">
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
                        <div class="icon6">
                            <a href="products_card.php"><i class="fa-solid fa-cart-shopping"></i></a>
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
                <div class="aside-products flex-container">
                    <div class="aside-category">
                        <h2>Shoes Category</h2>
                        <div class="shoes-category">
                            <nav>
                                <ul>
                            <?php 
                            foreach($products->fetch_category() as $category){
                            ?>
                            
                                <li><a href="#product-<?php echo $category->id; ?>"><?php  echo $category->category_name;?></a></li>
                            <?php
                            }
                            ?>
                                </ul>
                            </nav>
                        </div> 
                    </div>
                    <div class="products-collections flex-container">
                        <?php  
                            foreach($products->fetch_category() as $category){
                            foreach($products->product_CheckTypes($category->category_name) as $products_fetchAll) {
                        ?>
                        <div class="products-intro" id="product-<?php echo $category->id;?>">
                            <a href="products_collections.php?id=<?php echo $products_fetchAll->id; ?>">
                            <div class="products-img">
                                <img src="uploads/<?php echo $products_fetchAll->product_img; ?>">
                            </div>
                            <div class="products-para">
                                <h2><?php echo $products_fetchAll->product_name; ?></h2>
                                <p><?php echo $products_fetchAll->product_description; ?></p>
                            </div>
                            <div class="products-card">
                                <div class="card-vote">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="products-btn">
                                    <button><i class="fa-solid fa-credit-card"></i>Buy Items</button>
                                </div>
                            </div>
                            </a>
                        </div>
                        <?php
                            }
                        }
                        ?>
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
                                        <li><a href="#">Home</a></li>
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
        <script src="js/index.js"></script>
        
    </body>
</html>