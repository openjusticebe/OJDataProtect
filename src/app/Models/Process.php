<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends BaseModel
{
    use HasFactory;

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withPivot(['specific_description'])->withTimestamps();
    }
}
