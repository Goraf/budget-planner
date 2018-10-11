<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Psr\Container\ContainerInterface;

final class BudgetServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new BudgetService(
            $container->get(AccountRepositoryInterface::class),
            $container->get(IncomeRepositoryInterface::class)
        );
    }
}
