<?php

declare(strict_types=1);

use App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        $this->scheme->create('accounts', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->string('account_name', 40)->default('Account_name');
        });
    }

    public function down()
    {
        $this->scheme->drop('accounts');
    }
}
