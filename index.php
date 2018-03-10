<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 05.03.2018
 * Time: 1:26
 */

require 'application/lib/Dev.php';

use application\core\Router;


spl_autoload_register(function($class) {
    $path = str_replace("\\", "/", "$class.php");
    if (file_exists($path)) {
        require $path;
    }
});

session_start();
$router = new Router();
$router->run();