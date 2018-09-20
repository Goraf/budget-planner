<?php

declare(strict_types=1);

interface TemplateRendererInterface
{
    public function render(string $name, $params = []): string;
}
