<?php


namespace App\Models\Entities\Content;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $fillable = [
        'title', 'description', 'image_path','viewed_count'
    ];
}
