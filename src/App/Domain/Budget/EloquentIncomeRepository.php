<?php

declare(strict_types=1);

namespace App\Domain\Budget;

final class EloquentIncomeRepository implements IncomeRepositoryInterface
{
    public function add(Income $income): bool
    {
        return $income->save();
    }
}
