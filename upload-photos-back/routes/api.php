<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class,'getUserAccount']);

    Route::apiResource('/image', ImageController::class)
        ->only(['index', 'store', 'destroy']);

    Route::apiResource('/categories', CategoriesController::class)
        ->only(['index','show', 'store', 'update','destroy']);
});


