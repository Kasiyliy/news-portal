<?php

namespace App\Models\Entities\Support;

use Illuminate\Database\Eloquent\Model;

class PushUser extends Model
{
    protected $fillable = [
        'user_id',
        'platform',
        'push_token',
    ];
}
