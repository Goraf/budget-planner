<?php

declare(strict_types=1);

use App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncomeCategoriesTable extends Migration
{
    public function up()
    {
        $this->scheme->create('income_categories', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'income_categories__account_id__fk')
                ->references('id')->on('accounts');

            $table->string('income_category_name', 60);
        });
    }

    public function down()
    {
        $this->scheme->table('income_categories', function (Blueprint $table) {
            $table->dropForeign('income_categories__account_id__fk');
        });
        $this->scheme->drop('income_categories');
    }
}
