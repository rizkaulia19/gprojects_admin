<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class ClickSpecialization extends Model
{
    use HasUuid;

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
        'specializationId', 'userId'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specializationId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
