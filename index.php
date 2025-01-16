<?php

require 'app/core/Dev.php';

use app\core\Router;

spl_autoload_register(function ($class) {

    $path = str_replace('\\', '/', $class . '.php');

    if (file_exists($path)) {
        require $path;
    }
});

session_start();

$routerMan = new Router;

$routerMan->run();
?>