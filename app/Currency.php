<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // protected $fillable = [
    //     'code','name','ratio','isWithdrawable'
    // ];
    
    protected $keyType = 'string';

    public function advertises(){
        return $this->hasMany(Advertise::class, 'currencyId', 'id');
    }
}