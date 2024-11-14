<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::resource('/', AuthController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('/', AdminController::class);
    Route::resource('events', EventController::class);
});
