<?php


namespace App\Http\Requests\Web\V1\System\Content;


use App\Http\Requests\Web\WebBaseRequest;

class UserSendEventWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required','date'],
            'images' => ['array'],
            'representative' => ['required','string'],
            'place' => ['string'],
            'fio' => ['required','string'],
            'phone' => ['required','string'],
            'email' => ['email'],
            'website' => ['string'],
        ];
    }
}
