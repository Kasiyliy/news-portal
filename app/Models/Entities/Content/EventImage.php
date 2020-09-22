<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $fillable = [
        'image_path',
        'event_id'
    ];
}
