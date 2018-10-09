<?php

declare(strict_types=1);

namespace App\Domain\Budget;

use Illuminate\Database\Eloquent\Model;

final class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

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
