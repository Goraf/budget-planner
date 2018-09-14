<?php

namespace BudgetPlanner;

use PHPUnit\Framework\TestCase;

class HomePageControllerTest extends TestCase
{
    public function testShowItWorks()
    {
        $expected = 'It works!';
        $this->expectOutputString($expected);
        $page = new HomePageController;

        $page->show();
    }
}
