<?php

namespace App\Http\Middleware;

use App\Models\Car;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsPublicMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $cars = Car::query()->where(['id' => $request->get('id')])->get();
      if ($cars->isEmpty()){
          return response()->json(['error' => 'Not cars found!'], 404);
      }
        return $next($request);
    }
}
