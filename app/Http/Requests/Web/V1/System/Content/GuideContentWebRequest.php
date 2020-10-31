<?php

namespace App\Http\Requests\Web\V1\System\Content;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class GuideContentWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'title' => ['required', 'string'],
            'street' => ['required', 'string'],
            'time' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'image_path' => ['array'],
        ];
    }
}
