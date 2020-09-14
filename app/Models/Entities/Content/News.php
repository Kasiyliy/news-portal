<?php


namespace App\Models\Entities\Content;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/news';
    protected $fillable = [
        'title', 'description', 'image_path','viewed_count'
    ];
}
