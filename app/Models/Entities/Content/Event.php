<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/event';
    protected $fillable = [
        'title',
        'description',
        'date',
        'representative',
        'place',
        'fio',
        'phone',
        'email',
        'website',
        'is_accepted'
    ];

    public function images(){
        return $this->hasMany(EventImage::class,'event_id', 'id');
    }


}
