<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class UserSpecialization extends Model
{
    protected $keyType = 'string';

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specializationId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function project_applicants()
    {
        return $this->hasMany(ProjectApplicant::class, 'userId', 'id');
    }
}
