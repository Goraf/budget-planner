<?php

declare(strict_types=1);

use App\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class Init extends Migration
{
    public function up()
    {
        $this->scheme->create('users', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();

            $table->string('user_name', 30);

            $table->string('email_address', 40)->unique();

            $table->string('password_hash', 255);
        });
    }

    public function down()
    {
        $this->scheme->drop('users');
    }
}
