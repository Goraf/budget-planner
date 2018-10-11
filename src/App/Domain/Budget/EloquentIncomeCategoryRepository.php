<?php

declare(strict_types=1);

namespace App\Domain\Budget;

final class EloquentIncomeCategoryRepository implements IncomeCategoryRepositoryInterface
{
    public function getByName(string $name, int $accountId)
    {
        return IncomeCategory::where([
            ['account_id', '=', $accountId],
            ['income_category_name', '=', $name],
        ])->first();
    }
}
