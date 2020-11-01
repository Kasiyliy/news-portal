<?php

namespace App\Models\Entities\Content\Survey;

use App\Http\Forms\Web\V1\System\Content\Survey\SurveyWebForm;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    public const DEFAULT_RESOURCE_DIRECTORY = 'images/surveys';

    protected $fillable = [
        'title', 'is_visible', 'image_path'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'survey_id', 'id');
    }

    public function getBaseForm(){
        return SurveyWebForm::inputGroups($this);
    }
}
