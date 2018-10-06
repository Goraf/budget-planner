<?php

declare(strict_types=1);

namespace App\Domain\User;

use Zend\Expressive\Authentication\UserInterface;

final class UserService implements UserServiceInterface
{
    /** @var UserRepositoryInterface $repository */
    private $repository;

    /** @var callable $userFactory */
    private $userFactory;

    public function __construct(
        UserRepositoryInterface $repository,
        callable $userFactory
    ) {
        $this->repository = $repository;

        // Provide type safety for the composed user factory.
        $this->userFactory = function (
            string $identity,
            array $roles = [],
            array $details = []
        ) use ($userFactory) : UserInterface {
            return $userFactory($identity, $roles, $details);
        };
    }

    public function authenticate(
        string $credential,
        string $password = null
    ): ?UserInterface {
        return null;
    }
}
