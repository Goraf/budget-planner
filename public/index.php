<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use BudgetPlanner\HomePageController;
use function DI\create;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([
    HomePageController::class => create(HomePageController::class)
]);

$container = $containerBuilder->build();

$homePage = $container->get(HomePageController::class);
$homePage->show();
