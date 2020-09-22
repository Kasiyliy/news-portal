<?php


namespace App\Http\Forms\Web\V1\System\Content;

use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class EventWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('title', '', 'Заголовок',
                'text', true, $value ? $value->title : ''),
            FormUtil::textArea('description', '', 'Описание', false, $value ? $value->description : ''),
            FormUtil::input('image_path[]', 'Выберите фото:', 'Фотографии', 'file', $value ? false : true, null, true)
        );

    }
}
