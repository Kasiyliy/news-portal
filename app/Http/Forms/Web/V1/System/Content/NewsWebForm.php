<?php


namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class NewsWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('title', 'День Конституции', 'Заголовок',
                'text', true, $value ? $value->title : ''),
            FormUtil::textArea('description',
                'Новость можете прочитать сверху в меню нажав кнопку Жаналыктар', 'Описание',
                false, $value ? $value->description : ''),
            FormUtil::input('file', 'Выберите фото:', 'Фото:', 'file', $value ?false:true)





        );

    }
}
