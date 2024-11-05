<?php

use App\Http\Controllers\Api\v1\CarsController;
use App\Http\Controllers\Api\v1\CommentsController;
use App\Http\Middleware\IsPublicMiddleware;
use Illuminate\Support\Facades\Route;


Route::controller(CarsController::class)->prefix('cars')->group(function () {
    Route::get('/', 'list');
    Route::get('/{car}', 'show')->middleware([IsPublicMiddleware::class]);
    Route::patch('/{car}', 'update');
    Route::post('/', 'create');
    Route::delete('/{car}', 'delete');
});

Route::controller(CommentsController::class)->group(function () {
    Route::post('/cars/{car}/comment', 'create');
});

