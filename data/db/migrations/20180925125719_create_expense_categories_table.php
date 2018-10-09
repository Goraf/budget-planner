<?php

declare(strict_types=1);

use App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpenseCategoriesTable extends Migration
{
    public function up()
    {
        $this->scheme->create('expense_categories', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'expense_categories__account_id__fk')
                ->references('id')->on('accounts');

            $table->string('expense_category_name', 60);
        });
    }

    public function down()
    {
        $this->scheme->table('expense_categories', function (Blueprint $table) {
            $table->dropForeign('expense_categories__account_id__fk');
        });
        $this->scheme->drop('expense_categories');
    }
}
