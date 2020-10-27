<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class GovernmentProgram extends Model
{
    protected $fillable = [
        'name', 'description', 'digital_help', 'traditional_help'
    ];
}
