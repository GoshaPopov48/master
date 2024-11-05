<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsBannedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = \auth()->guard('web')->user();
//        dd($user);
        if (Auth::check() && $user->is_active === false ) {
            Auth::logout();
            return redirect()->route('home')
                ->withErrors(['error' => 'Ваш аккаунт деактивирован. Обратитесь в поддержку.']);
        }
        return $next($request);
    }
}
