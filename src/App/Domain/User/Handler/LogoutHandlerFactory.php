<?php

declare(strict_types=1);

namespace App\Domain\User\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Authentication\AuthenticationInterface;

final class LogoutHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new LogoutHandler;
    }
}
