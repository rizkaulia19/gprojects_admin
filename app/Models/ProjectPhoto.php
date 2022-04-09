<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class ProjectPhoto extends Model
{
    protected $keyType = 'string';

    public function project()
    {
        return $this->belongsTo(Project::class, 'projectId', 'id');
    }
}
