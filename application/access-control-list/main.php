<?php

declare(strict_types = 1);

// this is ACL for main controller
return [
    'all' => [
        'index',
        'about',
        'contact',
        'post'
    ],
    'authorized' => [

    ],
    'guest' => [

    ],
    'admin' => [
        //
    ]
];