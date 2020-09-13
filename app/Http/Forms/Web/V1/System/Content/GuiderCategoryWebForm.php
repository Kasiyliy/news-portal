<?php


namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Content\AboutUs;

class GuiderCategoryWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', 'Жиі қойылатын сұрақтар', 'Название',
                'text', true, $value ? $value->name : ''));
    }
}
