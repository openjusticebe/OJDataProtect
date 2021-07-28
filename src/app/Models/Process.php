<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
            ];


    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withPivot(['specific_description'])->withTimestamps();
    }

    public static function boot()
    {
        parent::boot();

        self::updated(function ($process) {
            // self::resetCache($process);
        });

        // self::deleting(function ($process) {
        //     $process->tags()->each(function ($tag) {
        //         $tag->delete();
        //     });
        // });
    }
}
