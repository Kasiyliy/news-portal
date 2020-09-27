<?php

namespace App\Models\Entities\Content\Survey;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title','survey_id','question_type_id','required','need_custom_answer'
    ];

    public function type() {
        return $this->belongsTo(QuestionType::class, 'question_type_id', 'id');
    }

    public function options(){
        return $this->hasMany(QuestionOption::class,'question_id', 'id');
    }
}
