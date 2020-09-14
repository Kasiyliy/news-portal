<?php


namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class SliderWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('title', 'Жастардың бүгінгі міндеті - оқу, білім, тәрбие жұмыстары. Жастар
                                бүгін сөзден іске көшетін заман.', 'Заголовок', 'text', true, $value ? $value->title : ''),
            FormUtil::input('file', 'Выберите фото:', 'Аватар:', 'file', false)
        );
    }
}
