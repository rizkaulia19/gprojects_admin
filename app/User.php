<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasUuid;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasUuid;

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','name', 'phone', 'roleId', 'username','password', 'email', 'nik', 'address', 'isGpro', 'bio', 'gender', 'birthdate','createdAt'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function role(){
        return $this->belongsTo(Role::class,'roleId', 'id');
    }

    public function projects(){
        return $this->hasMany(Project::class, 'userId', 'id');
    }

    public function project_applicants(){
        return $this->hasMany(ProjectApplicant::class, 'userId', 'id');
    }

    public function project_activities(){
        return $this->hasMany(ProjectActivity::class, 'userId', 'id');
    }

    public function user_specializations(){
        return $this->hasMany(UserSpecialization::class, 'userId', 'id');
    }

    public function click_specializations(){
        return $this->hasMany(ClickSpecialization::class, 'userId', 'id');
    }

    // public function specializations()
    // {
    //     return $this->belongsToMany(Specialization::class, 'user_specializations');
    // }
}
