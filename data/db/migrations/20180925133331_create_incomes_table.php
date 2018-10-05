<?php

declare(strict_types=1);

use App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncomesTable extends Migration
{
    public function up()
    {
        $this->scheme->create('incomes', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'incomes__account_id__fk')
                ->references('id')->on('accounts');

            $table->unsignedInteger('income_category_id');
            $table->foreign('income_category_id', 'incomes__income_category_id__fk')
                ->references('id')->on('income_categories');

            $table->date('income_date');

            $table->decimal('amount', 10, 2);

            $table->string('income_comment', 190);
        });
    }

    public function down()
    {
        $this->scheme->table('incomes', function (Blueprint $table) {
            $table->dropForeign('incomes__account_id__fk');
            $table->dropForeign('incomes__income_category_id__fk');
        });
        $this->scheme->drop('incomes');
    }
}
