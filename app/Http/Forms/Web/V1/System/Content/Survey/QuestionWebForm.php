<?php


namespace App\Http\Forms\Web\V1\System\Content\Survey;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Content\Survey\QuestionType;

class QuestionWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $types = QuestionType::all();
        $options = array();
        foreach ($types as $type) {
            $options[] = ['title' => $type->name,
                'selected' => $value ? $value->question_type_id == $type->id ? 'selected' : '' : '',
                'value' => $type->id];
        }


        $options2 = array();



            $need_custom_answer_checked = false;
            $required_checked = false;
            if ($value) {
                if ($value->need_custom_answer) $need_custom_answer_checked = true;
            }
            if ($value) {
            if ($value->required) $required_checked= true;
            }
            $options2[] = ['title' => 'Открытый ответ', 'checked' => $need_custom_answer_checked, 'value' => $need_custom_answer_checked];
            $options3[] = ['title' => 'Обязателельный', 'checked' => $required_checked, 'value' => $required_checked];




        return array_merge(
            FormUtil::checkbox('required[]', '', false, $options3),
            FormUtil::input('title', 'Сколько вам лет?', 'Вопрос',
                'text', true, $value ? $value->title : ''),
            FormUtil::select('question_type_id', 'Не выбрано', 'Тип', true, $options),
            FormUtil::checkbox('need_custom_answer[]', '', false, $options2)

        );
    }
}
