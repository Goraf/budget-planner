<?php

declare(strict_types=1);

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            // Fully\Qualified\ClassOrInterfaceName::class => Fully\Qualified\ClassName::class,
            Zend\Expressive\Authentication\AuthenticationInterface::class => Zend\Expressive\Authentication\Session\PhpSession::class,
            Zend\Expressive\Authentication\UserRepositoryInterface::class => App\Domain\User\AuthenticateUserServiceInterface::class,
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            App\Domain\User\UserRepositoryInterface::class => App\Domain\User\EloquentUserRepository::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories'  => [
            // Fully\Qualified\ClassName::class => Fully\Qualified\FactoryName::class,
            App\Domain\User\AuthenticateUserServiceInterface::class => App\Domain\User\AuthenticateUserServiceFactory::class,
            App\Domain\HomePage\Handler\HomePageHandler::class => App\Domain\HomePage\Handler\HomePageHandlerFactory::class,
            App\Domain\User\Handler\LoginHandler::class => App\Domain\User\Handler\LoginHandlerFactory::class,
        ],
    ],

    'authentication' => [
        'redirect' => '/login',
    ],
];
