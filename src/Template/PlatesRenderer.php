<?php

declare(strict_types=1);

namespace BudgetPlanner\Template;

use League\Plates\Engine;

final class PlatesRenderer implements TemplateRendererInterface
{
    /** @var Engine */
    private $template;

    public function __construct(Engine $template)
    {
        $this->template = $template;
    }

    public function render(string $name, $params = []): string
    {
        return $this->template->render($name, $params);
    }
}
