<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=> ['required', 'string','min:10', 'max:350'],
            'description'=>['string', 'max:600'],
            'preview'=>['image'],
            'price'=> ['required', 'integer', 'min:1'],
        ];
    }
}
