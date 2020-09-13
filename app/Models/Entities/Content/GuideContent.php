<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class GuideContent extends Model
{
    protected $fillable = [
        'title', 'description', 'category_id'
    ];
}
