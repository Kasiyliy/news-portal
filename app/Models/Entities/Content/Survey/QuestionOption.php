<?php

namespace App\Models\Entities\Content\Survey;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $fillable = [
        'question_id','text'
    ];
}
