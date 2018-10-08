<?php

declare(strict_types=1);

namespace App\Domain\Budget\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

final class BudgetMenuPageHandler implements RequestHandlerInterface
{
    /** @var TemplateRendererInterface $templateRenderer */
    private $templateRenderer;

    public function __construct(
        TemplateRendererInterface $renderer
    ) {
        $this->templateRenderer = $renderer;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse($this->templateRenderer->render('app::budget-menu'));
    }
}
