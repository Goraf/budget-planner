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
        return $this->belongsToMany(\App\Domain\User\User::class, 'user_accounts');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function expenseCategories()
    {
        return $this->hasMany(ExpenseCategory::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function incomeCategories()
    {
        return $this->hasMany(IncomeCategory::class);
    }
}
