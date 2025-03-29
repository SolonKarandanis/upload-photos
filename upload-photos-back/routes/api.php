<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class,'getUserAccount']);

    Route::apiResource('/image', ImageController::class)
        ->only(['index', 'store', 'destroy']);

    Route::apiResource('/categories', CategoriesController::class)
        ->only(['index','show', 'store', 'update','destroy']);

    Route::get('posts',[PostController::class,'getPosts']);
    Route::get('posts/{id}',[PostController::class,'show']);
    Route::get('/client/posts',[PostController::class,'loadMorePost']);
    Route::post('posts',[PostController::class,'store']);
    Route::put('posts/{id}',[PostController::class,'update']);
    Route::delete('posts/{id}',[PostController::class,'destroy']);
    Route::post('posts/upload-image',[PostController::class,'addImage']);
});


