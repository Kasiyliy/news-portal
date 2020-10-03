<?php

namespace App\Models\Entities\Content\Map;

use Illuminate\Database\Eloquent\Model;

class MapRegion extends Model
{
    protected $fillable = [
        'region',
        'title',
        'description',
        'boss',
        'email',
        'phones',
        'address',
        'instagram',
        'facebook',
        'vk',
        'youtube',
        'twitter',
    ];


}
