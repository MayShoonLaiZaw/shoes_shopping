<?php
require_once "../assets/init/classes/DB.php";
require_once "../assets/init/init.php";
class Products extends DB{
    private $con;
    public function __construct() {
        $this->con = $this->connect();
    }
    public function product_input($post,$file) :bool{
        if(isset($_POST['add'])) {
            $file_name = $file['img']['name'];
            $file_tmp_name = $file['img']['tmp_name'];
            $uploads = "uploads/";
            move_uploaded_file($file_tmp_name, $uploads. $file_name);
            $product_name = htmlentities(htmlspecialchars($post['product_name']));
            $product_description = htmlentities(htmlspecialchars($post['product_description']));
            $price = htmlentities(htmlspecialchars($post['price']));
            if($this->product_input_validator([
                "file_name" =>$file_name,
                "product_name"=> $product_name,
                "product_description" =>$product_description,
                "price" => $price
            ])) {
                $created_at = date("Y-m-d H:i:s");
                $sql = "INSERT INTO tbl_products(product_img,product_name,product_description,price,created_at) VALUES(:product_img,:product_name,:product_description,:price,:types,:created_at)";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam("product_img",$file_name,PDO::PARAM_STR);
                $stmt->bindParam("product_name",$product_name,PDO::PARAM_STR);
                $stmt->bindParam("product_description",$product_description,PDO::PARAM_STR);
                $stmt->bindParam("price",$price,PDO::PARAM_INT);
                $stmt->bindParam("created_at",$created_at,PDO::PARAM_STR);
                $stmt->execute();
                return true;
            }
        }
        return false;
    }
    public function product_input_validator($valid) {
        if(isset($_POST['add'])) {
            if($valid['file_name'] == "") {
                echo "<p style='text-align:center; background: #f00; padding: 10px;'>Choose Image Files!!</p>";
            } else {
                if($valid['product_name'] == "") {
                    echo "<p style='text-align:center; background: #f00; padding: 10px;'>Please Enter Product Name!!</p>";
                    return false;
                } else {
        
                    if($valid['product_description'] == "") {
                        echo "<p style='text-align:center; background: #f00; padding: 10px;'>Please Enter Product Descritpion!!</p>";
                        return false;
                    } else {
        
                        if($valid['price'] == "") {
                            echo "<p style='text-align:center; background: #f00; padding: 10px;'>Please Enter Price!!</p>";
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            }
        }
    }

    public function product_takeId(int $id):iterable{
        $sql = "SELECT * FROM tbl_products WHERE id=:id AND deleted_at IS NULL ORDER BY created_at DESC"; 
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("id",$id,PDO::PARAM_INT);
        $stmt->execute();
        $res= $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    public function product_CheckTypes(string $category_name) :iterable{
        $sql = "SELECT * FROM tbl_products WHERE category_name=:category_name ORDER BY created_at DESC"; 
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("category_name",$category_name,PDO::PARAM_STR);
        $stmt->execute();
        $res= $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res;

    }
    public function comments($post,int $product_id):bool {
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            if(isset($_POST['confirmbtn'])) {
                $comments = $post['comments'];
                if($comments == "") {
                    echo "<p style='background: #f00, padding: 10px;'>Please Enter Your Comments...</p>";
                } else {
                    if(strlen($comments) > 255) {
                        echo "<p style='background: #f00, padding: 10px;'>Your Comments Must be Less than 255.</p>";
                    } else {
                        $product_id = $_GET['id'];
                        $created_at = date("Y-m-d H:i:s");
                        $sql = "INSERT INTO tbl_comments(email,comments,product_id,created_at) VALUES(:email,:comments,:product_id,:created_at)";
                        $stmt= $this->con->prepare($sql);
                        $stmt->bindParam("email",$email,PDO::PARAM_STR);
                        $stmt->bindParam("comments",$comments,PDO::PARAM_STR);
                        $stmt->bindParam("product_id",$product_id,PDO::PARAM_INT);
                        $stmt->bindParam("created_at",$created_at,PDO::PARAM_STR);
                        $stmt->execute();
                        return true;
                    }
                }
            }
        }
        return false;
    }
    public function comments_fetch(int $id,string $email):iterable{
        $sql = "SELECT * FROM tbl_comments WHERE product_id=:product_id AND email=:email ORDER BY created_at DESC"; 
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam("product_id",$id,PDO::PARAM_INT);
        $stmt->bindParam("email",$email,PDO::PARAM_STR);
        $stmt->execute();
        $res= $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    public function fetch_category(){
        $sql = "SELECT * FROM tbl_categories WHERE deleted_at IS NULL ORDER BY created_at DESC"; 
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $res= $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    public function remove(){
        if(isset($_POST["remove"])) {
            return true;
        }
    }
}
?>