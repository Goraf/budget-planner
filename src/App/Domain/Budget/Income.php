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
        return $this->belongsTo(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(IncomeCategory::class);
    }
}
