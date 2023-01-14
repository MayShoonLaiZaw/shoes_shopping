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
        <link rel="stylesheet" href="css/products_collections.css">
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
                        <?php
                            if(isset($_SESSION['email'])) {
                            $check = new CheckId;
                            foreach($check->checkId() as $value) {

                        ?>
                            <div class="icon4">
                                <a href="userAccount.php?id=<?php echo $value->id;?>"><i class="fa fa-user"></i></a>
                            </div>
                        <?php
                            }
                        ?>
                        <div class="icon5" style="display:block">
                            <a href="../assets/SignOut.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                        </div>
                        <?php

                            }
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section>
                <div class="container">
                    <?php  
                        foreach($products->product_takeId($_GET['id']) as $products_fetchAll) {
                    ?>
                    <div class="products-collections">
                        <div class="products-intro flex-container">
                            <div class="products-photo">
                                <div class="products-img">
                                    <img src="uploads/<?php echo $products_fetchAll->product_img; ?>">
                                </div>
                            </div>
                            <div class="products-para">
                                <h2><?php echo $products_fetchAll->product_name;?></h2>
                                <div class="paragraph">
                                    <p><?php echo $products_fetchAll->product_description;?></p>
                                    <p><b><?php echo $products_fetchAll->price;?></b></p>
                                </div>
                                <div class="products-button flex-container">
                                    <form method="post" action="checkCard.php?id=<?php echo $products_fetchAll->id; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product_img" value="<?php echo $products_fetchAll->product_img; ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $products_fetchAll->product_name; ?>">
                                        <input type="hidden" name="price" value="<?php echo $products_fetchAll->price; ?>">
                                        <button type="submit" name="card">Add To Card</button>
                                    </form>
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="comments">
                                    <form  class="flex-container" id="confirm">
                                        <input type="text" placeholder="Write Your Comments...">
                                        <div class="comments-button">
                                            <button type="submit" name="confirm">Confirm</button>
                                        </div>
                                    </form>
                                    <form method="post" id="cancel-confirm">
                                        <textarea placeholder="Write Your Comments..." name="comments"></textarea>
                                        <div class="comments-button2 flex-container">
                                            <button type="submit" name="cancel" id="cancel">Cancel</button>
                                            <button type="submit" name="confirmbtn" id="confirmbtn">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                                <?php $products->comments($_POST,$_GET['id']);?>
                                <div class="comments-fetch">
                                    <h1>Comments</h1>
                                    <?php 

                                    foreach($products->comments_fetch($_GET['id'],$_SESSION['email']) as $comments_fetch) {
                                    ?>
                                    <ul>
                                        <li><i class="fa fa-envelope"></i><?php echo $comments_fetch->email; ?></li>
                                        <li><i class="fa-solid fa-comment"></i><?php echo $comments_fetch->comments; ?></li>
                                        <li><i class="fa fa-clock"></i><?php echo $comments_fetch->created_at; ?></li>
                                    </ul>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="read-more">
                                    <button type="submit" id="readmore">Read More</button>
                                    <button type="submit" id="readless">Read Less</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="products-seemore">
                        <h1>More <b style="color: rgb(255, 227, 67);"><?php echo $products_fetchAll->category_name; ?></b> Collections</h1>
                        <div class="products-data flex-container">
                            <?php 
                                foreach($products->product_CheckTypes($products_fetchAll->category_name)as $products_types) {
                            ?>
                            <div class="items-photo">
                                <div class="items-img">
                                    <img src="uploads/<?php echo $products_types->product_img;?>">
                                </div>
                                <div class="items-para flex-container">
                                    <div class="items-paragraph">
                                        <h2><?php echo $products_types->product_name; ?></h2>
                                        <p><?php echo $products_types->price; ?></p>
                                    </div>
                                    <div class="items-icon">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
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
        <script src="js/products_collections.js"></script>
        
    </body>
</html>