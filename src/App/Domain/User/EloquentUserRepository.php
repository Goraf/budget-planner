<?php

declare(strict_types=1);

namespace App\Domain\User;

final class EloquentUserRepository implements UserRepositoryInterface
{
    public function getUserByEmail(string $email)
    {
        return User::where('email_address', '=', $email)->first();
    }
}
