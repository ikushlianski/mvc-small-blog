<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 05.03.2018
 * Time: 1:34
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str) {
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
    exit;
}