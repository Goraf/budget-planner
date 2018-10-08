<?php

declare(strict_types=1);

namespace App\Domain\HomePage\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Authentication\UserInterface;
use Zend\Expressive\Session\Exception\MissingSessionContainerException;
use Zend\Expressive\Session\SessionMiddleware;
use Zend\Expressive\Template\TemplateRendererInterface;

final class HomePageHandler implements RequestHandlerInterface
{
    /** @var TemplateRendererInterface */
    private $templateRenderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->templateRenderer = $renderer;
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

        return new HtmlResponse($this->templateRenderer->render('app::home-page'));
    }
}
