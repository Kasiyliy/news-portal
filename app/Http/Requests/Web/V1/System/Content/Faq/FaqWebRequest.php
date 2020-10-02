<?php

namespace App\Http\Requests\Web\V1\System\Content\Faq;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class FaqWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
        ];
    }
}
