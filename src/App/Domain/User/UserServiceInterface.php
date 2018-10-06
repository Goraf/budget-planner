<?php

declare(strict_types=1);

namespace App\Domain\User;

use Zend\Expressive\Authentication\UserRepositoryInterface as AuthenticateServiceInterface;

interface UserServiceInterface extends AuthenticateServiceInterface
{
}
