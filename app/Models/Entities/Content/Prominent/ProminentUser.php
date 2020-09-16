<?php

namespace App\Models\Entities\Content\Prominent;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProminentUser extends Model
{
    use SoftDeletes;

    public const WOMAN = 1;
    public const MAN = 2;

    public const DEFAULT_RESOURCE_DIRECTORY = 'images/prominents/';


    protected $fillable = [
        'name', 'surname', 'patronymic', 'avatar_path',
        'biography', 'works', 'extra_information', 'birth_date', 'sex',
        'area_id'
    ];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }

    public function directions() {
        return $this->hasMany(ProminentUserDirection::class, 'prominent_user_id', 'id')
            ->with('direction');
    }

    public function area() {
        return $this->belongsTo(ProminentArea::class, 'area_id', 'id');
    }

    public function fullName() {
        return $this->surname. ' ' .$this->surname. ' ' .$this->patronymic;
    }
}
