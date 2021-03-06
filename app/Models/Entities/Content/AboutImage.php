<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    protected $fillable = [
        'image_path',
        'about_project_id'
    ];
}
