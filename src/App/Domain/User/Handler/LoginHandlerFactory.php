<?php

declare(strict_types=1);

namespace App\Domain\User\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Authentication\AuthenticationInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

final class LoginHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new LoginHandler(
            $container->get(TemplateRendererInterface::class),
            $container->get(AuthenticationInterface::class)
        );
    }
}
