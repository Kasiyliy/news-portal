<?php


namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class TeenagerGroupWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('name', '«Жас Отан» ЖҚ', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::textArea('description',
                'Мақсаты:  Қазақ халқының топтастырушы рөлін арқау ете отырып, Қазақстан халқының азаматтық және рухани-мәдени 
                ортақтығы негізінде қазақстандық бірдейлікті бәсекеге қабілетті ұлтты қалыптастыру.', 'Опиасание',
                false, $value ? $value->description : ''));

    }
}
