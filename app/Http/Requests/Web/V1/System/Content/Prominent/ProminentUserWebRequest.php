<?php

namespace App\Http\Requests\Web\V1\System\Content\Prominent;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProminentUserWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'patronymic' => ['required', 'string'],
            'area' => ['required', 'numeric'],
            'directions' => ['required', 'array'],
            'biography' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'works' => ['required', 'string'],
            'sex' => ['required', 'numeric'],
            'avatar' => [!request()->route('id') ? 'required': '', 'image'],
        ];
    }
}
