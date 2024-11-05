<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    public function createCar(StoreCarRequest $request): RedirectResponse
    {
        if ($request->hasFile('preview')) {
            $path = $request->file('preview')->store('public/car/image');
            $pathWithoutImage = str_replace('public', '', $path);
            $imageUrlPath = "storage" . $pathWithoutImage;
        }

        $cars = Car::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'preview_image' => $imageUrlPath ?? null,
            "is_public" => !empty($request->input('is_public')),
            'price' => $request->input('price')
        ]);
        return redirect()->route('car', ['car' => $cars->id])->with('success', 'Машина успешно добавлен.');
    }

    public function updateCar(UpdateRequest $request, Car $car): RedirectResponse
    {
        if ($request->hasFile('preview')) {
            $path = $request->file('preview')->store('public/car/image');
            $pathWithoutImage = str_replace('public', '', $path);
            $imageUrlPath = "storage" . $pathWithoutImage;
        }
        $car->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'preview_image' => $imageUrlPath ?? $car->preview_image,
            'is_public' => !empty($request->input('is_public')),
            'price' => $request->input('price')
        ]);
        return redirect()->route('car', ['car' => $car->id])->with('success', 'Данные о машине изменены.');
    }

    public function deleteCar(Car $car): RedirectResponse
    {
        $car->forceDelete();
        return redirect()->route('cars');
    }
}
