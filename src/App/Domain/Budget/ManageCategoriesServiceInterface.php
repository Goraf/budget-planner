<?php

declare(strict_types=1);

namespace App\Domain\Budget;

interface ManageCategoriesServiceInterface
{
    public function getIncomeCategory(string $name, int $accountId);
}
