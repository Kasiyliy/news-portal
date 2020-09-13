<?php

namespace App\Http\Requests\Web\V1\System\Content;

use Illuminate\Foundation\Http\FormRequest;

class GuideContentWebRequest extends FormRequest
{
    public function injectedRules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
