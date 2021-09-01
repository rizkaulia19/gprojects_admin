<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class PaymentType extends Model
{

    use SoftDeletes, HasUuid;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'createdAt';
    
    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';

    /**
     * The name of the "deleted at" column.
     *
     * @var string
     */
    const DELETED_AT = 'deletedAt';

    protected $fillable = [
        'paymentGatewayId','paymentTypeCategoryId','name','code','image','isAvailable','fixedFee','percentageFee'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function payment_gateway(){
        return $this->belongsTo(PaymentGateway::class,'paymentGatewayId', 'id');
    }

    public function payment_type_category(){
        return $this->belongsTo(PaymentTypeCategory::class,'paymentTypeCategoryId', 'id');
    }
}
