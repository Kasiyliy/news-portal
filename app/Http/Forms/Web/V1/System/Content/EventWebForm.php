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
            FormUtil::input('date', '01.06.2050', 'Дата мероприятия',
                'date', true, $value ? $value->date : '', null,'2020-01-01'),
            FormUtil::textArea('description', '', 'Описание', false, $value ? $value->description : ''),
            FormUtil::input('image_path[]', 'Выберите фото:', 'Фотографии', 'file', $value ? false : true, null, true)
        );

    }
}
