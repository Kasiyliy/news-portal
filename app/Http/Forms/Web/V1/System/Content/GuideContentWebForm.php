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
            FormUtil::textArea('description',
                'Новость можете прочитать сверху в меню нажав кнопку Жаналыктар', 'Описание',
                false, $value ? $value->description : ''));

    }
}
