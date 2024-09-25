<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/article', [ArticleController::class, "index"]);

Route::resource("article", ArticleController::class);
