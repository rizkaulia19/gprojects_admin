<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionType extends Model
{
    protected $keyType = 'string';

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'transactionTypeId', 'id');
    }
}
