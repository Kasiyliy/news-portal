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
            FormUtil::input('street', 'Улица', 'Улица', false, true, $value ? $value->street : ''),
            FormUtil::input('time', 'Время работы', 'Время работы', false, true, $value ? $value->time : ''),
            FormUtil::input('phone', 'Номер телефона', 'Номер телефона', false, true, $value ? $value->phone : ''),
            FormUtil::input('image_path[]', 'Выберите фото:', 'Фотографии', 'file', $value ? false : true, null, true)

        );

    }
}
