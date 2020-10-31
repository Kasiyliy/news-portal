<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 29.10.2020
 * Time: 18:23
 */

namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class MobileLinkWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('title', 'Название', 'Название',
                'text', true, $value ? $value->title : ''),
            FormUtil::input('link', 'https://vk.com', 'Ссылка',
                'text', true, $value ? $value->link : ''));
    }

}