<?php

namespace App\Models\Entities\Content\Faq;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question', 'answer', 'category_id'
    ];
}
