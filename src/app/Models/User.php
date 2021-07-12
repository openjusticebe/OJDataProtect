<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'api_token',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function organisations()
    {
        return $this->belongsToMany('App\Models\Organisation');
    }

    public function units()
    {
        return $this->belongsToMany('App\Models\Unit');
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->first_name} {$this->last_name}";
    }

    public function getIsAuthAttribute()
    {
        if (Auth::user()->id == $this->id) {
            return true;
        } else {
            return false;
        }
    }

    public function getDatetimesAttribute()
    {
        return [
      'updated_at'       => (string)$this->updated_at,
      'updated_at_diff'  => (string)$this->updated_at->diffForHumans(['parts' => 2]),
      'created_at'       => (string)$this->created_at,
      'created_at_diff'  => (string)$this->created_at->diffForHumans([
        'parts' => 2,
      ]),
    ];
    }
}
