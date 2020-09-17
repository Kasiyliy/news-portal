<?php


namespace App\Http\Requests\Web\V1\System\Content\Business;


use App\Http\Requests\Web\WebBaseRequest;

class BusinessCategoryWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string'],
            'file' => [ !request()->route('id') ? 'required': '', 'image'],
        ];
    }
}
