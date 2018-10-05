<?php

declare(strict_types=1);

// Don't load environment variables from file in production
if (!isset($_SERVER['APP_ENV'])) {
    $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
    $dotenv->load();
}

return [
    "paths" => [
        "migrations" => __DIR__ . "/../data/db/migrations"
    ],
    "migration_base_class" => "App\Migration\Migration",
    "environments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => "budget_planner_dev",
        "development" => [
            "adapter" => env('DB_DRIVER'),
            "host" => env('DB_HOST'),
            "name" => env('DB_DATABASE'),
            "user" => env('DB_USERNAME'),
            "pass" => env('DB_PASSWORD'),
            "port" => env('DB_PORT'),
            "charset" => env('DB_CHARSET'),
            "collation" => env('DB_COLLATION')
        ]
    ]
];
