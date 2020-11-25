<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Organisation extends Model
{
    protected $fillable = [
        'name',
        'vat_number',
    ];

  public function processes()
  {
      return $this->hasMany('App\Models\Process');
  }

  public function tags()
  {
      return $this->hasMany('App\Models\Tag');
  }

  public function members()
  {
       return $this->belongsToMany('App\User')
       ->withPivot(['member_type', 'is_external', 'is_admin'])
       ->withTimestamps()
       ->where('member_type', '!=', 'data_protection_officer');
  }

  public function dpo()
  {
       return $this->belongsToMany('App\User')
       ->withPivot(['member_type', 'is_external', 'is_admin'])
       ->withTimestamps()
       ->where('member_type', '=', 'data_protection_officer');
  }

}
