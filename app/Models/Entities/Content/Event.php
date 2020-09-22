<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/event';
    protected $fillable = [
        'title',
        'description',
    ];

    public function images(){
        return $this->hasMany(EventImage::class);
    }
}
