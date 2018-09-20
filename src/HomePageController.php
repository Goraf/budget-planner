<?php

declare(strict_types=1);

namespace BudgetPlanner;

use Psr\Http\Message\ResponseInterface;
use BudgetPlanner\Template\TemplateRendererInterface;

final class HomePageController
{
    /** @var ResponseInterface */
    private $response;

    /** @var TemplateRendererInterface */
    private $templateRenderer;

    public function __construct(ResponseInterface $response, TemplateRendererInterface $renderer)
    {
        $this->response = $response;
        $this->templateRenderer = $renderer;
    }

    public function __invoke(): ResponseInterface
    {
        $content = $this->templateRenderer->render('index.html');
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()->write($content);

        return $response;
    }
}
