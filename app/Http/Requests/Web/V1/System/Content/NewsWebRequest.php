<?php


namespace App\Http\Requests\Web\V1\System\Content;


use App\Http\Requests\Web\WebBaseRequest;

class NewsWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'file' => [ !request()->route('id') ? 'required': '', 'image'],
        ];
    }
}
