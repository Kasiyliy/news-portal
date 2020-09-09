<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 18:05
 */

namespace App\Http\Forms\Web\V1\System;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class ChangePasswordWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('current_password', 'Введите текущий пароль:', 'Текщуий пароль', 'password', true),
            FormUtil::input('password', 'Введите новый пароль:', 'Новый пароль', 'password', true),
            FormUtil::input('password_confirmation', 'Подтвердите новый пароль:', 'Подтвердите новый пароль:', 'password', true)
        );
    }
}