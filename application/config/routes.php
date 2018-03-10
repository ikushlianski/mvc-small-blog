<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 05.03.2018
 * Time: 2:08
 */

declare(strict_types=1);

function something($param) : void {
    echo "this is cool" .$param;
}

return [
    'account/login' => [
       "controller" => "account",
       "action" => "login"
    ],
    'account/register' => [
       "controller" => "account",
       "action" => "register"
    ],
    '' => [
        "controller" => "main",
        "action" => "index"
    ]
];