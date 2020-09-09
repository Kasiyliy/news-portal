<?php

namespace App\Models\Entities\Core;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public const ADMIN_ID = 1;
    public const ORGANIZATION_ID = 2;
    public const CLIENT_ID = 3;

    protected $fillable = [
        'name'
    ];
}
