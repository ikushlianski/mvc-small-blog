<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 05.03.2018
 * Time: 2:08
 */

declare(strict_types = 1);

return [
    // mainController
    '' => [
        "controller" => "main",
        "action" => "index"
    ],
    'about' => [
        'controller' => 'main',
        'action' => 'about'
    ],
    'contact' => [
      'controller' => 'main',
      'action' => 'contact'
    ],
    'post/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post'
    ],
    // adminController
    'admin/login' => [
        "controller" => "admin",
        "action" => "login"
    ],
    'admin/logout' => [
        "controller" => "admin",
        "action" => "logout"
    ],
    'admin/add' => [
        "controller" => "admin",
        "action" => "add"
    ],
    'admin/edit/{id:\d+}' => [
        "controller" => "admin",
        "action" => "edit"
    ],
    'admin/delete/{id:\d+}' => [
        "controller" => "admin",
        "action" => "delete"
    ],
    'admin/posts' => [
        "controller" => "admin",
        "action" => "posts"
    ]
];