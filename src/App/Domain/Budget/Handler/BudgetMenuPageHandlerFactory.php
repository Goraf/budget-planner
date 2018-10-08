<?php

declare(strict_types=1);

namespace App\Domain\Budget\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

final class BudgetMenuPageHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new BudgetMenuPageHandler(
            $container->get(TemplateRendererInterface::class)
        );
    }
}
