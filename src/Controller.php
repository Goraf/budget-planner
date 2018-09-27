<?php

declare(strict_types=1);

namespace BudgetPlanner;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\EmptyResponse;

abstract class Controller implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $action = $request->getAttribute('action', 'index') . 'Action';

        if (!method_exists($this, $action)) {
            return new EmptyResponse(404);
        }

        return $this->$action($request);
    }
}
