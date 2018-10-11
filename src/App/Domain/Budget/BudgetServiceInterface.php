<?php

declare(strict_types=1);

namespace App\Domain\Budget;

interface BudgetServiceInterface
{
    public function getByUserId(string $id);

    public function addIncome(array $params): bool;
}
