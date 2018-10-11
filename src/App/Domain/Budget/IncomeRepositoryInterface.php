<?php

declare(strict_types=1);

namespace App\Domain\Budget;

interface IncomeRepositoryInterface
{
    public function add(Income $income): bool;
}
