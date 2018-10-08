<?php

declare(strict_types=1);

namespace App\Domain\User\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Authentication\AuthenticationInterface;
use Zend\Expressive\Authentication\UserInterface;
use Zend\Expressive\Session\Exception\MissingSessionContainerException;
use Zend\Expressive\Session\SessionMiddleware;
use Zend\Expressive\Template\TemplateRendererInterface;

final class LoginHandler implements RequestHandlerInterface
{
    /** @var TemplateRendererInterface $templateRenderer */
    private $templateRenderer;

    /** @var AuthenticationInterface $service */
    private $service;

    public function __construct(
        TemplateRendererInterface $renderer,
        AuthenticationInterface $service
    ) {
        $this->templateRenderer = $renderer;
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        /** @var \Zend\Expressive\Session\Session $session */
        $session = $request->getAttribute(SessionMiddleware::SESSION_ATTRIBUTE);
        if (! $session) {
            throw MissingSessionContainerException::create();
        }

        // Already logged in
        if ($session->has(UserInterface::class)) {
            return new RedirectResponse('/budget');
        }

        // Handle submitted credentials
        if ('POST' === $request->getMethod()) {
            return $this->handleLoginAttempt($request);
        }

        // Display initial login form
        return new HtmlResponse($this->templateRenderer->render('app::login'));
    }

    private function handleLoginAttempt(ServerRequestInterface $request) : ResponseInterface
    {
        // Login was successful
        if ($this->service->authenticate($request)) {
            return new RedirectResponse('/budget');
        }

        // Login failed
        return new HtmlResponse($this->templateRenderer->render(
            'app::login',
            ['error' => 'Nieprawidłowe dane logowania, spróbuj ponownie.']
        ));
    }
}
