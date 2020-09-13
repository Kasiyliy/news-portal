<?php


namespace App\Http\Forms\Web\V1\System\Content;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Content\AboutUs;

class AboutUsWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('teenagers_count', '0', 'Жастар саны',
                'number', true, $value ? $value->where('type', AboutUs::TEENAGERS_COUNT)->first()->count : ''),
            FormUtil::input('applications_count', '0', 'Мемлекеттік бағдарламалар',
                'number', true, $value ? $value->where('type', AboutUs::APPLICATIONS_COUNT)->first()->count : ''),
            FormUtil::input('volunteers_count', '0', 'Еріктілер саны',
                'number', true, $value ? $value->where('type', AboutUs::VOLUNTEERS_COUNT)->first()->count : ''),
            FormUtil::input('resources_center_count', '0', 'Ресурстық орталық',
                'number', true, $value ? $value->where('type', AboutUs::RESOURCES_CENTER_COUNT)->first()->count : ''));
    }
}
