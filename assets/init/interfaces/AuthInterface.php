<?php 
interface AuthInterface{
    public function SignUp(array $post) :bool;
    public function SignIn(array $post) :bool;
    public function SignOut();
}
?>