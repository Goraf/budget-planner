<?php

declare(strict_types=1);

return [
    'eloquent' => [
        'driver'    => env('DB_DRIVER'),
        'host'      => env('DB_HOST'),
        'port'      => env('DB_PORT', ''),
        'database'  => env('DB_DATABASE'),
        'username'  => env('DB_USERNAME'),
        'password'  => env('DB_PASSWORD'),
        'charset'   => env('DB_CHARSET'),
        'collation' => env('DB_COLLATION'),
        'prefix'    => env('DB_PREFIX', ''),
    ]
];
