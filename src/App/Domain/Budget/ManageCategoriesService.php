<?php

declare(strict_types=1);

namespace App\Domain\Budget;

final class ManageCategoriesService implements ManageCategoriesServiceInterface
{
    /** @var IncomeCategoryRepositoryInterface $income */
    private $incomeCategories;

    public function __construct(IncomeCategoryRepositoryInterface $incomes)
    {
        $this->incomeCategories = $incomes;
    }

    public function getIncomeCategory(string $name, int $accountId)
    {
        return $this->incomeCategories->getByName($name, $accountId);
    }
}
