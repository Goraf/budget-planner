<?php

declare(strict_types=1);

use BudgetPlanner\HomePageController;
use BudgetPlanner\Template\PlatesRendererFactory;
use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;
use function DI\create;
use function DI\factory;
use function DI\get;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);

$containerBuilder->addDefinitions([
    HomePageController::class => create()->constructor(get('Response'), get('Renderer')),
    ResponseInterface::class => get('Response'),
    TemplateRendererInterface::class => get('Renderer'),
    'Renderer' => factory(PlatesRendererFactory::class),
    'Response' => function () {
        return new Response();
    },
    // Factories
    PlatesRendererFactory::class => create(),
]);

$container = $containerBuilder->build();

return $container;
