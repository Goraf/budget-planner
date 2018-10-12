<?php

declare(strict_types=1);

namespace App\Domain\Budget\Handler;

use App\Domain\Budget\BudgetServiceInterface;
use App\Domain\Budget\ManageCategoriesServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Authentication\UserInterface;
use Zend\Expressive\Session\SessionMiddleware;
use Zend\Expressive\Template\TemplateRendererInterface;

final class AddIncomeHandler implements RequestHandlerInterface
{
    /** @var BudgetServiceInterface $budget */
    private $budget;

    /** @var ManageCategoriesServiceInterface $categories */
    private $categories;

    /** @var TemplateRendererInterface $templateRenderer */
    private $templateRenderer;

    public function __construct(
        BudgetServiceInterface $budget,
        ManageCategoriesServiceInterface $categories,
        TemplateRendererInterface $renderer
    ) {
        $this->budget = $budget;
        $this->categories = $categories;
        $this->templateRenderer = $renderer;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if ('POST' === $request->getMethod()) {
            $params = $request->getParsedBody();

            /** @var \Zend\Expressive\Session\Session $session */
            $session = $request->getAttribute(SessionMiddleware::SESSION_ATTRIBUTE);

            $budgetId = $this->budget->getByUserId(
                $session->get(UserInterface::class)['username']
            )->id;

            $category_id = $this->categories->getIncomeCategory($params['category'], $budgetId)
                ->id;

            $result = $this->budget->addIncome(array_merge(
                $params,
                // overwrite category name by its id
                [
                    'account' => $budgetId,
                    'category' => $category_id,
                ]
            ));
        }

        return new HtmlResponse($this->templateRenderer->render('app::add-income'));
    }
}
