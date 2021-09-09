<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class ProjectSpecialization extends Model
{
    protected $keyType = 'string';
    
    public function specialization(){
        return $this->belongsTo(Specialization::class,'specializationId', 'id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'projectId', 'id');
    }
}
