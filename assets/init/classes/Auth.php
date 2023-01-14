<?php 

class Auth extends DB implements AuthInterface{
    private $con;
    public function __construct() {
        $this->con = $this->connect();
    }
    public function SignUp(array $post) :bool{
        if(isset($_POST['submit'])) {
            $username = htmlentities(htmlspecialchars($post['username']));
            $email = htmlentities(htmlspecialchars($post['email']));
            $password = htmlentities(htmlspecialchars($post['password']));
            $confirm_password = htmlentities(htmlspecialchars($post['confirm_password']));

            if($username == "") {
                echo "<p class='alert alert-danger'><i class='fa fa-user me-3' ></i>Please Enter Your Username.....</p>";
            } else {
                if($email == "") {
                    echo "<p class='alert alert-danger'><i class='fa fa-envelope me-3' ></i>Please Enter Your Email.....</p>";
                } else {
                    if($password == "") {
                        echo "<p class='alert alert-danger'><i class='fa fa-lock me-3' ></i>Please Enter Your Password.....</p>";
                    } else {
                        if(strlen($password) < 8) {
                            echo "<p class='alert alert-danger'><i class='fa-solid fa-ruler me-3'></i>Your Password should be safe and it's length must be greater than 8.</p>";
                        } else {
                            if($confirm_password == "") {
                                echo "<p class='alert alert-danger'><i class='fa fa-key me-3' ></i>Please Enter Your Confirm Password.....</p>";
                            } else {
                                if($password != $confirm_password) {
                                    echo "<p class='alert alert-danger'><i class='fa fa-square-xmark me-3'></i>Your password didn't match.....</p>";
                                } else {
                                    $checksql = "SELECT Count(*) AS count FROM tbl_auths WHERE email=:email";
                                    $checkstmt = $this->con->prepare($checksql);
                                    $checkstmt->bindParam("email",$email,PDO::PARAM_STR);
                                    $checkstmt->execute();
                                    $res = $checkstmt->fetch(PDO::FETCH_OBJ);
                                    if($res->count > 0) {
                                        echo "<p class='alert alert-danger'>Your Email has already been used!!!</p>";
                                        return false;
                                    }

                                    $created_at = date("Y-m-d H:i:s");
                                    $hash_password = password_hash($password,PASSWORD_BCRYPT);
                                    $sql="INSERT INTO tbl_auths(username,email,password,created_at) VALUES(:username,:email,:password,:created_at)";
                                    $stmt= $this->con->prepare($sql);
                                    $stmt->bindParam("username",$username,PDO::PARAM_STR);
                                    $stmt->bindParam("email",$email,PDO::PARAM_STR);
                                    $stmt->bindParam("password",$hash_password,PDO::PARAM_STR);
                                    $stmt->bindParam("created_at",$created_at,PDO::PARAM_STR);
                                    $stmt->execute();
                                    $_SESSION['email'] = $email;

                                    return true;

                                    
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
    public function SignIn(array $post) :bool {
        if(isset($_POST['submit'])) {
            $email = htmlentities(htmlspecialchars($post['email']));
            $password = htmlentities(htmlspecialchars($post['password']));

            if($this->SignInValidator([
                'email' => $email,
                'password' => $password
            ])
            ) {


                $_SESSION['email'] = $email;
                return true;
            }

        }
        return false;

    }
    private function SignInValidator(array $valid) :bool{
        if($valid['email'] == "") {
            echo "<p class='alert alert-danger'><i class='fa fa-envelope me-3' ></i>Please Enter Your Email.....</p>";
            return false;
        } 
        if($valid['password'] == "") {
            echo "<p class='alert alert-danger'><i class='fa fa-lock me-3' ></i>Please Enter Your Password.....</p>";
            return false;
        }
        if(strlen($valid['password']) < 8) {
            echo "<p class='alert alert-danger'><i class='fa-solid fa-ruler me-3'></i>Your Password should be safe and it's length must be greater than 8.</p>";
            return false;
        }
        $sql = "SELECT email,password FROM tbl_auths WHERE email = :email";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("email",$valid['email'],PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        if(!$res) {
            echo "<p class='alert alert-danger'><i class='fa fa-envelope me-3' ></i>Your Email is invalid...</p>";
            return false;
        }

        if($res->email != $valid['email']) {
            echo "<p class='alert alert-danger'><i class='fa fa-envelope me-3' ></i>Your Email is invalid...</p>";
            return false;
        }
        if(!password_verify($valid['password'],$res->password)) {
            echo "<p class='alert alert-danger'><i class='fa fa-lock me-3'></i>Your Password is invalid...</p>";
            return false;
        }
        return true;
    }
    public function SignOut() :bool {
        session_destroy();
        return true;
    }
}

?>