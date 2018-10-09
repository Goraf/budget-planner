<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Illuminate\Database\Eloquent\Model;

final class Expense extends Model
{
    protected $table = 'expenses';

    public $timestamps = false;

    public function account()
    {
        $this->belongsTo(Account::class);
    }
}
