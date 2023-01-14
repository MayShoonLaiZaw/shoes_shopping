<?php
// require '../vendor/autoload.php';
session_start();
spl_autoload_register(function($classes) {
    $paths = [
        "init/classes/$classes.php",
        "init/interfaces/$classes.php",
        "init/traits/$classes.php"
    ];
    foreach($paths as $value) {
        if(file_exists($value)) {
            require_once $value;
        }
    }
})

?>