<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\BasicFunctions;

class Tag extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function processes()
    {
        return $this->belongsToMany('App\Models\Process')->withPivot(['specific_description'])->withTimestamps();
    }

    public function process_tag()
    {
        return $this->hasMany('App\Models\ProcessTag');
    }

    public function getColorAttribute()
    {
        return BasicFunctions::getColor($this->category);
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
