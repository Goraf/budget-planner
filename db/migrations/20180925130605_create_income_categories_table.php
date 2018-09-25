<?php

declare(strict_types=1);

use BudgetPlanner\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncomeCategoriesTable extends Migration
{
    public function up()
    {
        $this->scheme->create('income_categories', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->string('income_category_name', 60);
        });
    }

    public function down()
    {
        $this->scheme->drop('income_categories');
    }
}
