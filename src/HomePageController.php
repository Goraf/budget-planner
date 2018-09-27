<?php

declare(strict_types=1);

namespace BudgetPlanner;

use BudgetPlanner\Controller;
use BudgetPlanner\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class HomePageController extends Controller
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

    public function indexAction(ServerRequestInterface $request): ResponseInterface
    {
        $content = $this->templateRenderer->render('index.html');
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()->write($content);

        return $response;
    }
}
