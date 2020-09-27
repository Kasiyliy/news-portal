<?php

namespace App\Models\Entities\Content\Survey;

use Illuminate\Database\Eloquent\Model;

class SurveyResultAnswer extends Model
{
    protected $fillable = [
        'question_id','survey_result_id','question_option_id','text'
    ];
}
