<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    protected $keyType = 'string';

    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class, 'transactionTypeId', 'id');
    }
}
