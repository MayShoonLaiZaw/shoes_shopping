<?php
require_once "../assets/init/classes/DB.php";
require_once "../assets/init/init.php";
class CheckId extends DB{
    private $con;
    public function __construct() {
        $this->con = $this->connect();
    }
    public function checkId():iterable {
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM tbl_auths WHERE email=:email ";
            $stmt= $this->con->prepare($sql);
            $stmt->bindParam("email",$email,PDO::PARAM_STR);
            $stmt->execute();
            $res= $stmt->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        else {
            echo "<script>location.href='../assets/SignIn.php';</script>";
        }
        
    }
}
?>