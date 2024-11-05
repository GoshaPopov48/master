<?php

namespace app\Http\Requests\Api\v1\Car;

use App\Http\Requests\Api\ApiRequest;

class StoreCarRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'preview_image' => ['image'],
            'price' => ['required', 'integer', 'min:1'],
        ];
    }
}
