<?php

declare(strict_types=1);

namespace BudgetPlanner\Template;

use Psr\Container\ContainerInterface;
use League\Plates\Engine as PlatesEngine;

final class PlatesRendererFactory
{
    public function __invoke(): PlatesRenderer
    {
        $engine = new PlatesEngine(ROOT_DIR.'/resources/views');

        $engine->setFileExtension(null);

        return new PlatesRenderer($engine);
    }
}
