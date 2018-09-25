<?php

declare(strict_types=1);

use BudgetPlanner\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAccountsTable extends Migration
{
    public function up()
    {
        $this->scheme->create('user_accounts', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_accounts__user_id__fk')
                ->references('id')->on('users');

            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'user_accounts__account_id__fk')
                ->references('id')->on('accounts');
        });
    }

    public function down()
    {
        $this->scheme->table('user_accounts', function (Blueprint $table) {
            $table->dropForeign('user_accounts__user_id__fk');
            $table->dropForeign('user_accounts__account_id__fk');
        });
        $this->scheme->drop('user_accounts');
    }
}
