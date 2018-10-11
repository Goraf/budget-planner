<?php

declare(strict_types=1);

namespace App\Domain\Budget;

interface IncomeCategoryRepositoryInterface
{
    public function getByName(string $name, int $accountId);
}
