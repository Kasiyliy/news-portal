<?php

namespace App\Http\Requests\Web\V1\System\Content;

use App\Http\Requests\Web\WebBaseRequest;

class SliderWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
          'title' => ['required', 'string'],
          'file' => ['nullable', 'image'],
        ];
    }
}
