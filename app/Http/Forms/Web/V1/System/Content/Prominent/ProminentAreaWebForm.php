<?php


namespace App\Http\Forms\Web\V1\System\Content\Prominent;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class ProminentAreaWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', 'Байзак ауданы', 'Название',
                'text', true, $value ? $value->name : ''));
    }
}
