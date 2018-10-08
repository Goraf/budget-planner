<?php

declare(strict_types=1);

namespace App\Domain\User;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Authentication\UserInterface;

final class AuthenticateUserServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthenticateUserService(
            $container->get(UserRepositoryInterface::class),
            $container->get(UserInterface::class)
        );
    }
}
