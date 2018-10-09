<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Illuminate\Database\Eloquent\Model;

final class Account extends Model
{
    protected $table = 'accounts';

    public $timestamps = false;

    public function users()
    {
        $this->belongsToMany(\App\Domain\User\User::class, 'user_accounts');
    }

    public function expenses()
    {
        $this->hasMany(Expense::class);
    }

    public function expenseCategories()
    {
        $this->hasMany(ExpenseCategory::class);
    }

    public function paymentMethods()
    {
        $this->hasMany(PaymentMethod::class);
    }
}
