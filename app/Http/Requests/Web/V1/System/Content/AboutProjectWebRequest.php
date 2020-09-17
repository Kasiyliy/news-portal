<?php

namespace App\Http\Requests\Web\V1\System\Content;

use App\Http\Requests\Web\WebBaseRequest;

class AboutProjectWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'main_title' => ['required', 'string'],
            'main_description' => ['required', 'string'],
            'main_image' => ['image'],
            'image_path' => ['array'],
            'footer_title' => ['required', 'string'],
            'footer_image' => ['image'],
            'footer_address' => ['required', 'string'],
            'footer_number' => ['required', 'string'],
        ];
    }
}
