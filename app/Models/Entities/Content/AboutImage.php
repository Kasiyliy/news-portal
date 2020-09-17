<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    protected $fillabel = [
        'image_path',
        'about_project_id'
    ];
}
