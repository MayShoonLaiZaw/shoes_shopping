<?php require_once "inc/header.php"; ?>
<section style="background-image: url('./images/wallpapersden.com_nike-sport-shoes_1920x1080.jpg'); height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4 col-sm-12">
                <div class="card mt-5 border-radius-10">
                    <div class="card-body">
                        <h1 class="text-center">Sign In</h1>
                        <?php 
                            $auth = new Auth;
                            if($auth->SignIn($_POST)) {
                                echo "<script>location.href='../Shopping/index.php';</script>";
                            }
                        ?>
                        <form method="post">
                            <div class="form-floating my-3">
                                <input type="email" placeholder="Email" name="email" id="email" class="form-control">
                                <label for="email"><i class="fa-solid fa-envelope"></i>Email</label>
                            </div>
                            <div class="form-floating my-3">
                                <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                                <label for="password"><i class="fa-solid fa-lock"></i>Password</label>
                            </div>
                            <div class="form-floating my-3">
                                <button type="submit" name="submit" class="btn btn-outline-warning float-end">Sign In<i class="fa-solid fa-right-to-bracket"></i></button>
                            </div>
                        </form>
                    </div>
                    <p class='text-center'>If you don't have an account,please <a href="SignUp.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

        
<?php require_once "inc/footer.php"; ?>