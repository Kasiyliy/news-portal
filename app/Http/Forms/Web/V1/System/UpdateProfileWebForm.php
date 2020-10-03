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
            FormUtil::input('name', 'Атыңызды енгізіңіз:', 'Аты', 'text', true, $value ? $value->name : null),
            FormUtil::input('surname', 'Тегіңізді енгізіңіз:', 'Тегі', 'text', true, $value ? $value->surname : null),
            FormUtil::input('file', 'Фото таңдаңыз:', 'Аватар:', 'file', false)
        );
    }

}
