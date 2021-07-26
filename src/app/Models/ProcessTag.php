<?php

namespace App\Models;

class ProcessTag extends BaseModel
{
    protected $table = 'process_tag';

    protected $appends = [

  ];

    protected $fillable = [
    'process_id',
    'text_id',
    'tag_id',
    'snippet_start',
    'snippet_end',
    'user_id',
  ];

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

    public function process()
    {
        return $this->belongsTo('App\Models\Process');
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($process_tag) {
            $tag = $process_tag->tag()->first();

            // == 1 because it's excuted before calling delete on the model
            if ($tag->process_tag()->count() == 1 && $tag->children()->count() == 0) {
                $tag->delete();
            }
        });
    }
}
