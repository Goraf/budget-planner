<?php

declare(strict_types=1);

namespace BudgetPlanner\Template;

interface TemplateRendererInterface
{
    public function render(string $name, $params = []): string;
}
