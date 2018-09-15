<?php

declare(strict_types=1);

use BudgetPlanner\HomePageController;
use DI\ContainerBuilder;
use Relay\Relay;
use Zend\Diactoros\ServerRequestFactory;
use function DI\create;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([
    HomePageController::class => create(HomePageController::class)
]);

$container = $containerBuilder->build();

$middlewareQueue = [];

$requestHandler = new Relay($middlewareQueue);
$requestHandler->handle(ServerRequestFactory::fromGlobals());

$homePage = $container->get(HomePageController::class);
$homePage->show();
