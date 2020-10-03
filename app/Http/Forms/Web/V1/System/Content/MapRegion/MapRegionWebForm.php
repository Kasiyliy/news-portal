<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 3.10.2020
 * Time: 17:01
 */

namespace App\Http\Forms\Web\V1\System\Content\MapRegion;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class MapRegionWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('region', 'Байзак ауданы', 'Название региона',
                'text', true, $value ? $value->region : ''),
            FormUtil::input('title', 'Байзак ауданы', 'Главный текст',
                'text', true, $value ? $value->title : ''),
            FormUtil::textArea('description', 'Описание', 'Описание',
                false, $value ? $value->description : ''),
            FormUtil::input('boss', 'Имя Фамилия', 'Управляющий регионом',
                'text', true, $value ? $value->boss : ''),
            FormUtil::input('email', 'Email', 'Почта',
                'text', true, $value ? $value->email : ''),
            FormUtil::input('phones', '+7 (777) 777 77 77', 'Номера телефонов',
                'text', true, $value ? $value->phones : ''),
            FormUtil::input('address', 'Пушкина 7', 'Адрес',
                'text', true, $value ? $value->address : ''),
            FormUtil::input('instagram', 'Ссылка в инстаграм', 'Ссылка в инстаграм',
                'text', false, $value ? $value->instagram : ''),
            FormUtil::input('facebook', 'Ссылка в facebook', 'Ссылка в facebook',
                'text', false, $value ? $value->facebook : ''),
            FormUtil::input('vk', 'Ссылка в vk', 'Ссылка в vk',
                'text', false, $value ? $value->vk : ''),
            FormUtil::input('youtube', 'Ссылка в youtube', 'Ссылка в youtube',
                'text', false, $value ? $value->youtube : ''),
            FormUtil::input('twitter', 'Ссылка в twitter', 'Ссылка в twitter',
                'text', false, $value ? $value->twitter : '')
        );
    }

}