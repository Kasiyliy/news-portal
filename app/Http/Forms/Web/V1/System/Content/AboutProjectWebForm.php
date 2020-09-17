<?php


namespace App\Http\Forms\Web\V1\System\Content;

use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class AboutProjectWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('main_title', 'Проект включает в себя четыре компонента', 'Заголовок',
                'text', true,$value ? $value->main_title : ''),
            FormUtil::input('main_image', 'Выберите фото:', 'Фото на главной странице:', 'file', $value ? false : true),
            FormUtil::textArea('main_description',
                '1.Обучение молодых людей по развитию жизненно важных навыков и управлению проектами', 'Описание',
                false, $value ? $value->main_description : ''),
            FormUtil::input('about_image[]', 'Выберите до 4 фото:', 'Фотографии на странице о проекте', 'file', $value ? false : true, null, true),

            FormUtil::input('footer_title', 'Жастар Саясаты басқармасы', 'Заголовок',
                'text', true, $value ? $value->footer_title : ''),
            FormUtil::input('footer_image', 'Выберите фото:', 'Логотип', 'file', $value ? false : true),
            FormUtil::input('footer_address', 'Адрес:', 'Адрес',
                'text', true, $value ? $value->footer_address : ''),
            FormUtil::input('footer_number', 'Номер:', 'Номер',
                'text', true, $value ? $value->footer_number : '')

        );

    }
}
