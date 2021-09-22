<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'safe_keeping_duration',
        'reminder_every',
        'start_date',
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d h:i:s',
        'notified_at' => 'datetime:Y-m-d h:i:s'
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


    public function getTagsGroupedAttribute()
    {
        $tags = $this->tags()->get();

        $tags_grouped = $tags->mapToGroups(function ($item, $key) {
            return [$item['category'] => [
                'name' => $item['name'],
                'type' => $item['type'],
                'category' => $item['category'],
                'description' => $item['description'],
                'specific_description' => $item->pivot->specific_description,
                'color' => $item->color,
                'links' =>
                    [ 'self' => route('organisation.tag.show', [$item->organisation, $item]) ]
            ]];
        });
        
        return $tags_grouped;
    }


    public static function boot()
    {
        parent::boot();

        self::created(function ($process) {
        });

        self::updated(function ($process) {

            // self::sendUpdateStatusOfProcess($process);
            // self::resetCache($process);
        });

        // self::deleting(function ($process) {
        //     $process->tags()->each(function ($tag) {
        //         $tag->delete();
        //     });
        // });
    }
}
