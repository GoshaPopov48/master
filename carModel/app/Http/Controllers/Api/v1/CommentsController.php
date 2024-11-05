<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comments\StoreRequest;
use App\Models\Car;


class CommentsController extends Controller
{
    public function create(StoreRequest $request, Car $car)
    {
        $car->comments()->create($request->validated());
        return response()->json([
            'status' => true
        ], 201);
    }
}
