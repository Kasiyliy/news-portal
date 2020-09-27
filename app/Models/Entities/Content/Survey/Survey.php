<?php

namespace App\Models\Entities\Content\Survey;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'title','is_visible'
    ];

    public function questions(){
        return $this->hasMany(Question::class,'survey_id', 'id');
    }
}
