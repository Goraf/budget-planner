<?php

declare(strict_types=1);

namespace BudgetPlanner;

use Psr\Http\Message\ResponseInterface;

final class HomePageController
{
    /** @var ResponseInterface */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()->write('It works!');

        return $response;
    }
}
