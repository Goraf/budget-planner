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

            $table->string('payment_method_name', 60);
        });
    }

    public function down()
    {
        $this->scheme->drop('payment_methods');
    }
}
