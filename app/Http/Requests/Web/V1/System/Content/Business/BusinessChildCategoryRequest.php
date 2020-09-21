<?php


namespace App\Http\Requests\Web\V1\System\Content\Business;


use App\Http\Requests\Web\WebBaseRequest;

class BusinessChildCategoryRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }
}
