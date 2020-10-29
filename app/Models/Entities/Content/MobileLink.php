<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class MobileLink extends Model
{
    protected $fillable = [
        'title',
        'link'
    ];
}
