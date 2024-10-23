<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAhliController;
use App\Http\Controllers\ApiPostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route Baca API
Route::get('/posts', [ApiPostController::class, 'getPosts'])->name('api.posts.get');
Route::post('/posts', [ApiPostController::class, 'submitPosts'])->name('api.posts.submit');

Route::get('/get-ahli', [ApiAhliController::class, 'getAhliParlimen'])->name('api.ahli.get');
