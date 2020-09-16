<?php

namespace App\Models\Entities\Content\Prominent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProminentArea extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function users() {
        return $this->hasMany(ProminentUser::class, 'area_id', 'id');
    }
}
