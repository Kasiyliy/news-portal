<?php


namespace App\Http\Forms\Web\V1\System\Content\Business;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class BusinessContentWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('title', 'Как читать новость?', 'Заголовок',
                'text', true, $value ? $value->title : ''),
            FormUtil::textArea('description',
                'Информацию можете прочитать сверху в меню нажав кнопку Бизнес', 'Описание',
                false, $value ? $value->description : ''),
            FormUtil::input('file', 'Выберите фото:', 'Фото:', 'file', $value ?false:true));

    }
}
