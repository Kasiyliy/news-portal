<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/sliders';
    protected $fillable = [
        'title', 'image_path'
    ];
}
