<?php

namespace App\Http\Requests\Web\V1\System\Content\Faq;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class FaqCategoryWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }
}
