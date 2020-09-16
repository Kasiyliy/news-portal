<?php

namespace App\Models\Entities\Content\Prominent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProminentDirection extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
}
