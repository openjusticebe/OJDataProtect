<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organistation');
    }

    public function processes()
    {
        return $this->belongsToMany('App\Models\Process')->withPivot(['specific_description'])->withTimestamps();
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOfCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
