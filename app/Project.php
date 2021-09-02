<?php

namespace App;

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
        'userId','code','name','cost'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function project_specializations(){
        return $this->hasMany(ProjectSpecialization::class, 'projectId', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'userId', 'id');
    }

}
