<?php

declare(strict_types=1);

use BudgetPlanner\HomePageController;
use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;
use function DI\create;
use function DI\get;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);

$containerBuilder->addDefinitions([
    HomePageController::class => create()->constructor(get('Response')),
    ResponseInterface::class => get('Response'),
    'Response' => function () {
        return new Response();
    },
]);

$container = $containerBuilder->build();

return $container;
