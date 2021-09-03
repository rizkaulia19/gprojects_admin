<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class ProjectApplicant extends Model
{

    // protected $table = 'project_applicants';

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
        'userId','projectId','status'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class,'userId', 'id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'projectId', 'id');
    }
}
