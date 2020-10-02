<?php

namespace App\Models\Entities\Content\Faq;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function questions() {
        return $this->hasMany(Faq::class, 'category_id', 'id');
    }
}
