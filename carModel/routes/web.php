<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\web\PagesController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\IsBannedMiddleware;
use App\Http\Middleware\LastActivityMiddleware;
use App\Http\Middleware\NonAuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::controller(PagesController::class)->middleware([IsBannedMiddleware::class, LastActivityMiddleware::class])->group(function () {
    Route::get('/home', 'home')->name('home');
    Route::get('/cars', 'cars')->name('cars');
    Route::get('/cars/create', 'createCarForm')->name('createCarForm')->middleware([NonAuthMiddleware::class]);
    Route::get('/cars/{car}', 'showCar')->name('car');
    Route::get('/cars/{car}/edit', 'updateCarForm')->name('updateCarForm')->middleware([NonAuthMiddleware::class]);
    Route::get('/support', 'support')->name('support');

});
Route::controller(CarsController::class)->middleware([IsBannedMiddleware::class, LastActivityMiddleware::class])->group(function () {
    Route::post('/cars/create', 'createCar')->name('createCar');
    Route::post('/cars/{car}/update', 'updateCar')->name('updateCar')->middleware([NonAuthMiddleware::class]);
    Route::post('/cars/{car}/delete', 'deleteCar')->name('deleteCar')->middleware([NonAuthMiddleware::class]);
});

Route::controller(RegisterController::class)->middleware([IsBannedMiddleware::class, LastActivityMiddleware::class,AuthMiddleware::class])->group(function () {
    Route::get('/register', 'index')->name('register.form');
    Route::post('/register', 'register')->name('register.action');

});

Route::controller(LoginController::class)->middleware([IsBannedMiddleware::class, LastActivityMiddleware::class])->group(function () {
    Route::get('/login', 'index')->name('login.form');
    Route::post('/login', 'login')->name('login.action');
    Route::post('/logout', 'logout')->name('logout')->middleware([NonAuthMiddleware::class]);

});





