<?php


namespace App\Http\Forms\Web\V1\System\Content\Prominent;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Content\Prominent\ProminentArea;
use App\Models\Entities\Content\Prominent\ProminentDirection;
use App\Models\Entities\Content\Prominent\ProminentUser;

class ProminentUserWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $areas = ProminentArea::all();
        $directions = ProminentDirection::all();
        $options = array();
        $options2 = array();
        $sex = [array('title' => 'Мужской',
            'selected' => $value ? $value->sex == ProminentUser::MAN ? 'selected' : '' : '',
            'value' => ProminentUser::MAN),
            array('title' => 'Женский',
                'selected' => $value ? $value->sex == ProminentUser::WOMAN ? 'selected' : '' : '',
                'value' => ProminentUser::WOMAN)];
        foreach ($areas as $area) {
            $options[] = ['title' => $area->name,
                'selected' => $value ? $value->area_id == $area->id ? 'selected' : '' : '',
                'value' => $area->id];
        }
        foreach ($directions as $direction) {
            $checked = false;
            if($value->directions->where('direction_id', $direction->id)->first()) $checked = true;
            $options2[] = ['title' => $direction->name, 'checked' => $checked, 'value' => $direction->id];
        }
        return array_merge(
            FormUtil::input('surname', 'Жунис', 'Фамилия',
                'text', true, $value ? $value->surname : ''),
            FormUtil::input('name', 'Ерлан', 'Имя',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('patronymic', 'Тосбаевич', 'Отчество',
                'text', true, $value ? $value->patronymic : ''),
            FormUtil::input('birth_date', '01.06.1998', 'Год рождения',
                'date', true, $value ? $value->birth_date : ''),
            FormUtil::input('avatar', 'Выберите фото', 'Аватар',
                'file', $value ? false : true),
            FormUtil::select('area', 'Не выбрано', 'Район', true, $options),
            FormUtil::select('sex', 'Не выбрано', 'Пол', true, $sex),
            FormUtil::checkbox('directions[]', 'Направление', true, $options2),
            FormUtil::textArea('biography', 'Родился в Городе Алматы.', 'Биография',
                false, $value ? $value->biography : ''),
            FormUtil::textArea('works', 'Организовал помощь ветеранам', 'Работы',
                false, $value ? $value->works : ''),
            FormUtil::textArea('extra_information', 'Сейчас выступает в защите бездомных животных',
                'Доп. информация', false, $value ? $value->extra_information : ''));

    }
}
