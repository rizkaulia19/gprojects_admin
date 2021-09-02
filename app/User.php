<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasUuid;

class User extends Authenticatable
{
    use Notifiable, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','name', 'phone', 'roleId'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function role(){
        return $this->belongsTo(Role::class,'roleId', 'id');
    }

    public function projects(){
        return $this->hasMany(Project::class, 'userId', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
