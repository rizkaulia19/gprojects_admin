<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class Project extends Model
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
        'currencyId', 'advertiseId', 'userId', 'code', 'name', 'isAvailable', 'address', 'description', 'cost', 'province', 'city'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function project_specializations()
    {
        return $this->hasMany(ProjectSpecialization::class, 'projectId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function advertise()
    {
        return $this->belongsTo(Advertise::class, 'advertiseId', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currencyId', 'id');
    }

    public function project_activities()
    {
        return $this->hasMany(ProjectActivity::class, 'projectId', 'id');
    }

    public function project_applicants()
    {
        return $this->hasMany(ProjectApplicant::class, 'projectId', 'id')->orderBy('updatedAt', 'DESC');
    }

    public function project_photos()
    {
        return $this->hasMany(ProjectPhoto::class, 'projectId', 'id');
    }
}
