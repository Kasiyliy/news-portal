<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class GuideContent extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/event';
    protected $fillable = [
        'title', 'street', 'time', 'phone', 'category_id',
    ];

    public function images()
    {
        return $this->hasMany(GuideContentImage::class, 'guide_contents_id', 'id');
    }
}

