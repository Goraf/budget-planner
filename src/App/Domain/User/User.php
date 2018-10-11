<?php

declare(strict_types=1);

namespace App\Domain\User;

use Illuminate\Database\Eloquent\Model;

final class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    public function accounts()
    {
        return $this->belongsToMany(\App\Domain\Budget\Account::class, 'user_accounts');
    }
}
