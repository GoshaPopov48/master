<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request, User $user)
    {
        $user = User::query()
            ->where('number', $request->input('number'))
            ->first();
        if (!$user->isActive()) {
            return redirect()->route('home')
                ->withErrors(['error' => 'Ваш аккаунт деактивирован. Обратитесь в поддержку.']);
        }
        if (Auth::attempt($request->validated())) {
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['auth_error' => 'Проверьте введенные данные']);

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');

    }
}
