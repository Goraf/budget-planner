<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use App\Domain\User\User;

final class EloquentAccountRepository implements AccountRepositoryInterface
{
    public function getByUserId(string $id)
    {
        return User::find($id)->accounts()->first();
    }
}
