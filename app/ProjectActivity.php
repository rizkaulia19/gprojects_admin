<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class ProjectActivity extends Model
{

    // protected $fillable = [
    //     'userId','projectId','name','description','type','isConfirmed'
    // ];

    protected $keyType = 'string';

    // public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class,'userId', 'id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'projectId', 'id');
    }
}
