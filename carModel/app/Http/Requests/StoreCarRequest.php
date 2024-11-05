<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=> ['required', 'string', 'max:350'],
            'description'=>['required', 'string', 'max:600'],
            'preview'=>['image'],
            'price'=> ['required', 'integer', 'min:1'],
        ];
    }
}
