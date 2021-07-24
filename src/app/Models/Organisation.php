<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organisation extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vat_number',
    ];

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('slug', $value)->firstOrFail();
    }


    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\Tag');
    }

    public function units()
    {
        return $this->hasMany('App\Models\Unit');
    }


    public function members()
    {
        return $this->belongsToMany('App\Models\User')
       ->withPivot(['member_type', 'is_external', 'is_admin'])
       ->withTimestamps()
       ->where('member_type', '!=', 'data_protection_officer');
    }

    public function dpos()
    {
        return $this->belongsToMany('App\Models\User')
       ->withPivot(['member_type', 'is_external', 'is_admin'])
       ->withTimestamps()
       ->where('member_type', '=', 'data_protection_officer');
    }
}
