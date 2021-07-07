<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

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
