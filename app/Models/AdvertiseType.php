<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class AdvertiseType extends Model
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
        'code', 'name'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function advertises()
    {
        return $this->hasMany(Advertise::class, 'advertiseTypeId', 'id');
    }
}
