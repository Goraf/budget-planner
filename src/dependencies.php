<?php

declare(strict_types=1);

use BudgetPlanner\HomePageController;
use DI\ContainerBuilder;
use function DI\create;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);

$containerBuilder->addDefinitions([
    HomePageController::class => create(HomePageController::class)
]);

$container = $containerBuilder->build();

return $container;
