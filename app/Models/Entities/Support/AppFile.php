<?php

namespace App\Models\Entities\Support;

use Illuminate\Database\Eloquent\Model;

class AppFile extends Model
{
    public const DEFAULT_IMAGE_ID = 1;

    protected $fillable = [
        'filename',
        'relative_path',
        'system_url',
        'cloud_url',
    ];
}
