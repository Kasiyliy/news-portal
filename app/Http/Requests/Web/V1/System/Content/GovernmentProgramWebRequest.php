<?php

namespace App\Http\Requests\Web\V1\System\Content;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class GovernmentProgramWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
