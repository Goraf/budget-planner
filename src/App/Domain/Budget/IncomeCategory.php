<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Illuminate\Database\Eloquent\Model;

final class IncomeCategory extends Model
{
    protected $table = 'income_categories';

    public $timestamps = false;

    public function account()
    {
        $this->belongsTo(Account::class);
    }

    public function incomes()
    {
        $this->hasMany(Income::class);
    }
}
