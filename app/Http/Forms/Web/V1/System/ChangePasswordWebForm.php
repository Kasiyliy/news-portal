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
            FormUtil::input('current_password', 'Ағымдағы құпия сөзді енгізіңіз:', 'Ағымдағы құпия сөз', 'password', true),
            FormUtil::input('password', 'Жаңа құпия сөзді енгізіңіз:', 'Жаңа құпия сөз', 'password', true),
            FormUtil::input('password_confirmation', 'Жаңа құпия сөзді растаңыз:', 'Жаңа құпия сөзді растаңыз:', 'password', true)
        );
    }
}
