<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email);
}
