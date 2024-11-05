<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use app\Http\Requests\Api\v1\Car\StoreCarRequest;
use app\Http\Requests\Api\v1\Car\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function list()
    {

        return Car::query()
            ->select(['id', 'name', 'description', 'price'])
            ->where('is_public', true)
            ->get()
            ->map(function ($cars) {
                return [
                    'status' => $cars->is_public,
                    'data' => [
                        'id' => $cars->id,
                        'title' => $cars->name,
                        'description' => $cars->description,
                        'price' => $cars->price
                    ]
                ];
            });
    }

    public function create(StoreCarRequest $request)
    {
        if ($request->hasFile('preview_image')) {
            $path = $request->file('preview_image')->store('public/car/image');
            $pathWithoutImage = str_replace('public', '', $path);
            $imageUrlPath = "storage" . $pathWithoutImage;
        }

        $cars = Car::query()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'preview_image' => $imageUrlPath ?? null,
            'is_public' => $request->boolean('is_public'),
            'price' => $request->input('price')
        ]);
        return response()->json($this->show($cars))->setStatusCode(201, 'Car created');
    }

    public function show(Car $car)
    {
        return [
            'status' => $car->is_public,
            'data' => [
                'id' => $car->id,
                'title' => $car->name,
                'description' => $car->description,
                'price' => $car->price,
                'comments' => $car->comments->map(function ($comment) {
                    return [
                        'user' => $comment->username,
                        'body' => $comment->comment,
                    ];
                })
            ]
        ];
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);

        return response()->json([
            "status" => $car->is_public,
            "data" => [
                'name' => $car->name,
                'description' => $car->description,
                'price' => $car->price
            ]
        ]);
    }

    public function delete(Car $car)
    {
        return  [
            'status' => $car->delete(),
        ];
    }

}
