<?php

namespace App\Models\Entities\Content;

use Illuminate\Database\Eloquent\Model;

class GuideCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function contents() {
        return $this->hasMany(GuideContent::class, 'category_id', 'id');
    }
}
