<?php

declare(strict_types=1);

use App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        $this->scheme->create('expenses', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'expenses__account_id__fk')
                ->references('id')->on('accounts');

            $table->unsignedInteger('expense_category_id');
            $table->foreign('expense_category_id', 'expenses__expense_category_id__fk')
                ->references('id')->on('expense_categories');

            $table->date('expense_date');

            $table->unsignedInteger('payment_method_id');
            $table->foreign('payment_method_id', 'expenses__payment_method_id__fk')
                ->references('id')->on('payment_methods');

            $table->decimal('amount', 10, 2);

            $table->string('expense_comment', 190);
        });
    }

    public function down()
    {
        $this->scheme->table('expenses', function (Blueprint $table) {
            $table->dropForeign('expenses__account_id__fk');
            $table->dropForeign('expenses__expense_category_id__fk');
            $table->dropForeign('expenses__payment_method_id__fk');
        });
        $this->scheme->drop('expenses');
    }
}
