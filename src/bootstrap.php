<?php

declare(strict_types=1);

use FastRoute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Relay\Relay;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
use function FastRoute\simpleDispatcher;

define('ROOT_DIR', dirname(__DIR__));

$dotenv = new Dotenv\Dotenv(ROOT_DIR);
// Don't load environment variables from file in production
if (!isset($_SERVER['APP_ENV'])) {
    $dotenv->load();
}

/** @var DI\Container $container */
$container = require_once 'dependencies.php';

$dbConnectionManager = new Capsule();
$dbConnectionManager->addConnection([
    'driver' => env('DB_DRIVER'),
    'host' => env('DB_HOST'),
    'port' => env('DB_PORT', ''),
    'database' => env('DB_DATABASE'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'charset' => env('DB_CHARSET'),
    'collation' => env('DB_COLLATION'),
    'prefix' => env('DB_PREFIX', ''),
]);
$dbConnectionManager->setAsGlobal();
$dbConnectionManager->bootEloquent();

$dispatcher = simpleDispatcher(function (RouteCollector $r) {
    $routes = include 'routes.php';
    foreach ($routes as $route) {
        $r->addRoute(...$route);
    }
});

$middlewareQueue[] = new FastRoute($dispatcher);
$middlewareQueue[] = new RequestHandler($container);

$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emiter = new SapiEmitter();
$emiter->emit($response);
