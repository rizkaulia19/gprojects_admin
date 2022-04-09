<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTypeCategory extends Model
{
    // protected $fillable = [
    //     'code','name','image'
    // ];

    protected $keyType = 'string';

    public function payment_type_categories()
    {
        return $this->hasMany(PaymentGatewayChannel::class, 'paymentTypeCategoryId', 'id');
    }
}
