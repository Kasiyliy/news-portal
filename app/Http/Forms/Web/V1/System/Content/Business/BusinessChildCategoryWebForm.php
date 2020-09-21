<?php


namespace App\Http\Forms\Web\V1\System\Content\Business;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class BusinessChildCategoryWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', 'Құрылыс', 'Название',
                'text', true, $value ? $value->name : ''));
    }
}
