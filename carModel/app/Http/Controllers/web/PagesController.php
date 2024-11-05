<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestResourse;
use App\Models\Car;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.hello');
    }

    public function cars()
    {
        $cars = Car::query()
            ->where('is_public', true)
            ->orderBy('id', 'desc');

        return view('pages.cars',
            ['cars' => $cars->get()]);
    }

    public function showCar(Car $car): View|Factory|Application
    {
        return view('pages.car', [
            'car' => $car
        ]);
    }

    public function createCarForm()
    {
        return view('pages.addCar');
    }

    public function updateCarForm(Car $car)
    {
        return view('pages.editCar',
            ['car' => $car]);
    }

    public function support()
    {
        return view('pages.supports');
    }
}
