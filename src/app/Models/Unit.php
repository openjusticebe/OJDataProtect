<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organistation');
    }

    public function members()
    {
        return $this->belongsToMany('App\Models\User')
       ->withTimestamps();
    }
}
