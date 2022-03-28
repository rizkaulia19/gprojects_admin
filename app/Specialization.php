<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class Specialization extends Model
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
        'islandId','name','code','image','icon','color'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function project_specializations(){
        return $this->hasMany(ProjectSpecialization::class, 'specializationId', 'id');
    }

    public function user_specializations(){
        return $this->hasMany(UserSpecialization::class, 'specializationId', 'id');
    }

    public function click_specializations(){
        return $this->hasMany(ClickSpecialization::class, 'specializationId', 'id');
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'user_specializations');
    // }
}
