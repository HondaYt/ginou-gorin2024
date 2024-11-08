<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function() {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');

});


Route::middleware('auth')->prefix('admin')->group(function () {
    // Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::resource('/', AdminController::class);
    Route::resource('events', EventController::class);
});
