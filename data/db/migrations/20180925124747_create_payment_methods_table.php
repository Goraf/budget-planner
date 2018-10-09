<?php

declare(strict_types=1);

use App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentMethodsTable extends Migration
{
    public function up()
    {
        $this->scheme->create('payment_methods', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'payment_methods__account_id__fk')
                ->references('id')->on('accounts');

            $table->string('payment_method_name', 60);
        });
    }

    public function down()
    {
        $this->scheme->table('payment_methods', function (Blueprint $table) {
            $table->dropForeign('payment_methods__account_id__fk');
        });
        $this->scheme->drop('payment_methods');
    }
}
