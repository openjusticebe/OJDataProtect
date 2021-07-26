<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    // use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    public function getDatetimesAttribute()
    {
        return [
      'updated_at'       => (string)$this->updated_at,
      'updated_at_diff'  => (string)$this->updated_at->diffForHumans(['parts' => 2]),
      'created_at'       => (string)$this->created_at,
      'created_at_diff'  => (string)$this->created_at->diffForHumans(['parts' => 2]),
      'cached_at'        => $this->cached_at ? (string)$this->cached_at : false ,
      'cached_at_diff'   => $this->cached_at ? (string)$this->cached_at->diffForHumans(['parts' => 2]) : __('app.never'),
    ];
    }

    public function needToCache()
    {
        if ($this->cached_at) {
            if ($this->updated_at > $this->cached_at) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function setCached()
    {
        $this->cached_at = now();
        $this->save();
    }

    public function getTypeAttribute()
    {
        return class_basename($this);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value, '-'))->exists()) {
            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['slug'] = $slug;
    }
    
    public function incrementSlug($slug)
    {
        // get the slug of the latest created post
        $max = static::whereName($this->name)->latest('id')->skip(1)->value('slug');

        if (is_numeric($max[-1])) {
            return pred_replace_callback('/(\d+)$/', function ($matches) {
                return $matches[1] + 1;
            }, $max);
        }
        return "{$slug}-2";
    }
}
