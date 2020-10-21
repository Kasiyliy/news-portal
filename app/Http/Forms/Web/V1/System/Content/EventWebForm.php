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
                'date', true, $value ? $value->date : '', null,'2020-02-02'),
            FormUtil::textArea('description', '', 'Описание', false, $value ? $value->description : ''),
            FormUtil::input('representative', '', 'Представитель',
                'text', true, $value ? $value->representative : ''),
            FormUtil::input('place', '', 'Место проведения',
                'text', true, $value ? $value->place : ''),
            FormUtil::input('fio', 'Иванов Иван Иванович', 'ФИО',
                'text', true, $value ? $value->fio : ''),
            FormUtil::input('phone', '+7(777) 777-7777', 'Телефон',
                'number', true, $value ? $value->phone : ''),
            FormUtil::input('email', '', 'Е-майл',
                'email', true, $value ? $value->email : ''),
            FormUtil::input('image_path[]', 'Выберите фото:', 'Фотографии', 'file', $value ? false : true, null, true)
        );

    }
}
