<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class AboutProject extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/about_project';
    protected $fillable = [
        'main_title',
        'main_description',
        'main_image',
        'footer_title',
        'footer_image',
        'footer_address',
        'footer_number'
    ];

    public function images(){
        return $this->hasMany(AboutImage::class);
    }
}
