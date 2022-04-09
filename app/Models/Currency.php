<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // protected $fillable = [
    //     'code','name','ratio','isWithdrawable'
    // ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function advertises()
    {
        return $this->hasMany(Advertise::class, 'currencyId', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'currencyId', 'id');
    }
}
