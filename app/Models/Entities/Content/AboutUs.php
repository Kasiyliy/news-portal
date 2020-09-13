<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{

    public const TEENAGERS_COUNT = 1;
    public const APPLICATIONS_COUNT = 2;
    public const VOLUNTEERS_COUNT = 3;
    public const RESOURCES_CENTER_COUNT = 4;

    protected $fillable = [
        'title', 'count', 'type'
    ];
}
