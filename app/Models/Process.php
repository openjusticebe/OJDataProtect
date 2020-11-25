<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withPivot(['specific_description'])->withTimestamps();
    }


}
