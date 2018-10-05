<?php

declare(strict_types=1);

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

/**
 * Self-called anonymous function that creates its own scope and keep the global namespace clean.
 */
(function () {
    // Don't load environment variables from file in production
    if (!isset($_SERVER['APP_ENV'])) {
        $dotenv = new \Dotenv\Dotenv('.');
        $dotenv->load();
    }

    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php';

    $dbConnectionManager = new \Illuminate\Database\Capsule\Manager;
    $dbConnectionManager->addConnection($container->get('config')['eloquent']);
    $dbConnectionManager->setAsGlobal();
    $dbConnectionManager->bootEloquent();

    /** @var \Zend\Expressive\Application $app */
    $app = $container->get(\Zend\Expressive\Application::class);
    $factory = $container->get(\Zend\Expressive\MiddlewareFactory::class);

    // Execute programmatic/declarative middleware pipeline and routing
    // configuration statements
    (require 'config/pipeline.php')($app, $factory, $container);
    (require 'config/routes.php')($app, $factory, $container);

    $app->run();
})();
