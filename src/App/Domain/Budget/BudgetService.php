<?php

declare(strict_types=1);

namespace App\Domain\Budget;

final class BudgetService implements BudgetServiceInterface
{
    /** @var AccountRepositoryInterface $account */
    private $account;

    /** @var IncomeRepositoryInterface $income */
    private $income;

    public function __construct(
        AccountRepositoryInterface $account,
        IncomeRepositoryInterface $income
    ) {
        $this->account = $account;
        $this->income = $income;
    }

    public function getByUserId(string $id)
    {
        return $this->account->getByUserId($id);
    }

    public function addIncome(array $params): bool
    {
        $income = new Income;
        $income->account_id = $params['account'];
        $income->income_category_id = $params['category'];
        $income->income_date = $params['date'];
        $income->amount = $params['amount'];
        $income->income_comment = $params['comment'] ?? '';

        return $this->income->add($income);
    }
}
