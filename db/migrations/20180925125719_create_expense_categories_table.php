<?php

declare(strict_types=1);

use BudgetPlanner\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpenseCategoriesTable extends Migration
{
    public function up()
    {
        $this->scheme->create('expense_categories', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->string('expense_category_name', 60);
        });
    }

    public function down()
    {
        $this->scheme->drop('expense_categories');
    }
}
