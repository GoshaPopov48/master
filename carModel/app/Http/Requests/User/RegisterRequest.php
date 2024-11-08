<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'number'=>['required', 'string', 'min:1', 'unique:users,number'],
            'email'=> ['required', 'email', 'unique:users,email'],
            'password'=> ['required', 'min:8', 'confirmed'],
        ];
    }
}
