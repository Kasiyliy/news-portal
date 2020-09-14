<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 21:03
 */

namespace App\Http\Forms\Web;


class FormUtil
{
    public static function input($name, $placeholder, $label, $type, $required, $value = null): array
    {
        return [$name => compact('placeholder', 'label', 'type', 'required', 'value')];
    }

    public static function select($name, $placeholder, $label, $required = true, $options = []): array
    {
        $type = 'select';
        return [$name => compact('placeholder', 'label', 'type', 'required', 'options')];
    }

    public static function option($value, $selected, $title): array
    {
        return compact('value', 'selected', 'title');
    }

    public static function textArea($name, $placeholder, $label, $required, $value = null): array {
        $type = 'textarea';
        return [$name => compact('placeholder', 'label', 'type', 'required', 'value', 'type')];

    }



}
