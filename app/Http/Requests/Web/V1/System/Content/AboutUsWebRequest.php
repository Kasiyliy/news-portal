<?php

namespace App\Http\Requests\Web\V1\System\Content;

use App\Http\Requests\Web\WebBaseRequest;

class AboutUsWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'teenagers_count' => ['required', 'numeric'],
            'applications_count' => ['required', 'numeric'],
            'resources_center_count' => ['required', 'numeric'],
            'volunteers_count' => ['required', 'numeric']
        ];
    }
}
