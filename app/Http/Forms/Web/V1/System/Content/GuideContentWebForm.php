<?php


namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class GuideContentWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('title', 'Как читать новость?', 'Заголовок',
                'text', true, $value ? $value->title : ''),
            FormUtil::input('description', '', 'Описание',
            'text', true, $value ? $value->title : ''));

    }
}
