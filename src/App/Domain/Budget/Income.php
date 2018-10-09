<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Illuminate\Database\Eloquent\Model;

final class Income extends Model
{
    protected $table = 'incomes';

    public $timestamps = false;

    public function account()
    {
        $this->belongsTo(Account::class);
    }

    public function category()
    {
        $this->belongsTo(IncomeCategory::class);
    }
}
