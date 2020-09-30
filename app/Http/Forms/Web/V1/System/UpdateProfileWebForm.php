<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 18:07
 */

namespace App\Http\Forms\Web\V1\System;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class UpdateProfileWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', 'Введите ваше имя:', 'Имя', 'text', true, $value ? $value->name : null),
            FormUtil::input('surname', 'Введите ваше фамилию:', 'Фамилия', 'text', true, $value ? $value->surname : null),
            FormUtil::input('file', 'Выберите фото:', 'Аватар:', 'file', false)
        );
    }

}
