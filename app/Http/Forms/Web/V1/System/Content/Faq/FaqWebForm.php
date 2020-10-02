<?php


namespace App\Http\Forms\Web\V1\System\Content\Faq;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class FaqWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('question', 'Как читать новость?', 'Заголовок',
                'text', true, $value ? $value->question : ''),
            FormUtil::textArea('answer',
                'Новость можете прочитать сверху в меню нажав кнопку Жаналыктар', 'Описание',
                false, $value ? $value->answer : ''));

    }
}
