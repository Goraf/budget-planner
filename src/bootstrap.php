<?php

declare(strict_types=1);

use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Relay\Relay;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
use function FastRoute\simpleDispatcher;

$container = require_once 'dependencies.php';

$dispatcher = simpleDispatcher(function (RouteCollector $r) {
});

$middlewareQueue[] = new FastRoute($dispatcher);
$middlewareQueue[] = new RequestHandler($container);

$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emiter = new SapiEmitter();
$emiter->emit($response);
