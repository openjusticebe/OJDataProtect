<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Unit extends Model
{
    protected $fillable = [

    ];

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organistation');
    }

    public function members()
    {
        return $this->belongsToMany('App\User')
       ->withTimestamps()
    }

    
}
