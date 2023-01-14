<?php
    require_once "./init/init.php";
    $auth = new Auth();
    if($auth->signOut()) {
        echo "<script>location.href='SignIn.php'</script>";
    }
?>