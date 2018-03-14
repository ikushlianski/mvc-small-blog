<?php

declare(strict_types = 1);

// this is ACL for main controller
return [
    'all' => [
        'login'
    ],
    'authorized' => [

    ],
    'guest' => [

    ],
    'admin' => [
        'posts',
        'logout',
        'add',
        'edit',
        'delete'
    ]
];