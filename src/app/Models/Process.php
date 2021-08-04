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
        return $this->belongsToMany('App\Models\Tag')
        ->withPivot(['specific_description'])
        ->withTimestamps()
        ->orderByRaw('FIELD(category, 
        "data_operator",
        "data_processor",
        "data_object",
        "data_subject",
        "purpose",
        "data_controller",
        "data_recipient"
        ) ASC');
    }

    public function editor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'updated_by',
            'id'
        );
    }

    public function creator()
    {
        return $this->belongsTo(
            'App\Models\User',
            'created_by',
            'id'
        );
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
