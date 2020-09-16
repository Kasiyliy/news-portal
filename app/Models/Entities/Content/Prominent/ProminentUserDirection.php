<?php

namespace App\Models\Entities\Content\Prominent;

use Illuminate\Database\Eloquent\Model;

class ProminentUserDirection extends Model
{
    protected $fillable = ['prominent_user_id', 'direction_id'];

    public function direction() {
        return $this->belongsTo(ProminentDirection::class, 'direction_id', 'id');
    }

}
