<?php

abstract class DB{
    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "shoes_shopping";

    protected function connect() {
        try{
            $con = new PDO("mysql:host=$this->localhost; dbname=$this->dbname",$this->username,$this->password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>