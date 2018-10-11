<?php

declare(strict_types=1);

namespace App\Domain\Budget;

interface AccountRepositoryInterface
{
    public function getByUserId(string $id);
}
