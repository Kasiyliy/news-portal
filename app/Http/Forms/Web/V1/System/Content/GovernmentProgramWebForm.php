<?php


namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class GovernmentProgramWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', '100 мектеп', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::textArea('description',
                '100 мектеп', 'Описание',
                true, $value ? $value->description : ''),
            FormUtil::textArea('digital_help',
                'Описание электронной помощи', 'Электронная помощь',
                false, $value ? $value->digital_help : ''),
            FormUtil::textArea('traditional_help',
                'Описание традицонной помощи', 'Традиционная помощь',
                false, $value ? $value->traditional_help : ''));

    }
}
