<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get(
        '/',
        [
            Zend\Expressive\Session\SessionMiddleware::class,
            App\Domain\HomePage\Handler\HomePageHandler::class,
        ],
        'home'
    );
    $app->route(
        '/login',
        [
            Zend\Expressive\Session\SessionMiddleware::class,
            App\Domain\User\Handler\LoginHandler::class,
        ],
        ['GET', 'POST'],
        'login'
    );
    $app->get(
        '/budget',
        [
            Zend\Expressive\Session\SessionMiddleware::class,
            Zend\Expressive\Authentication\AuthenticationMiddleware::class,
            App\Domain\Budget\Handler\BudgetMenuPageHandler::class,
        ],
        'budget'
    );
    $app->get(
        '/logout',
        [
            Zend\Expressive\Session\SessionMiddleware::class,
            App\Domain\User\Handler\LogoutHandler::class,
        ],
        'logout'
    );
};
