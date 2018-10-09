<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Illuminate\Database\Eloquent\Model;

final class ExpenseCategory extends Model
{
    protected $table = 'expense_categories';

    public $timestamps = false;

    public function account()
    {
        $this->belongsTo(Account::class);
    }

    public function expenses()
    {
        $this->hasMany(Expense::class);
    }
}
