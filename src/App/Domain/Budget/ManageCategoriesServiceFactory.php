<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Psr\Container\ContainerInterface;

final class ManageCategoriesServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new ManageCategoriesService(
            $container->get(IncomeCategoryRepositoryInterface::class)
        );
    }
}
