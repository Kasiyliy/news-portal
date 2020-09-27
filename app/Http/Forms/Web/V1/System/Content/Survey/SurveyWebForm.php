<?php


namespace App\Http\Forms\Web\V1\System\Content\Survey;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class SurveyWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('title', 'Опрос по трудоустроймости', 'Название',
                'text', true, $value ? $value->title : ''));
    }
}
