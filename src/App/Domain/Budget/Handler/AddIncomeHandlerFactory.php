<?php

declare(strict_types=1);

namespace App\Domain\Budget\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

final class AddIncomeHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new AddIncomeHandler(
            $container->get(TemplateRendererInterface::class)
        );
    }
}
