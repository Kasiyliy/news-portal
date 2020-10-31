<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class GuideContentImage extends Model
{
    protected $fillable = [
        'image_path',
        'guide_contents_id'
    ];
}
