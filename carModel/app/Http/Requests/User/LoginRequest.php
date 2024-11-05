<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'=>['email','string'],
            'number'=>['min:1'],
            'password'=>['required']
        ];
    }
}
