<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        switch ($this->category) {
            case 'data_object':
                return '#f66d9b';
            case 'data_subject':
                return '#ffed4a';
            case 'data_recipient':
                return '#6574cd';
            case 'purpose':
                return '#38c172';
            case 'data_processor':
                return '#e3342f';
            case 'data_controller':
                return '#f66d9b';
            case 'data_operator':
                return '#6574cd';
            default:
                return '#69b3b3';
        }
        
        //  return '#'.substr(md5($this->name), 0, 6);
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
