<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::middleware("auth:sanctum")->group(function () {
        Route::get("/user", [AuthenticationController::class, 'getUserAccount']);
        Route::get('/logout', [AuthenticationController::class, 'logout']);
    });
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResource('/image', ImageController::class)
        ->only(['index', 'store', 'destroy']);

    Route::apiResource('/categories', CategoriesController::class)
        ->only(['index','show', 'store', 'update','destroy']);

    Route::prefix('onboarding')->group(function () {
        Route::post('setup/pin', [PinController::class, 'setupPin']);
        Route::middleware('has.set.pin')->group(function () {
            Route::post('validate/pin', [PinController::class, 'validatePin']);
            Route::post('generate/account-number', [AccountController::class, 'store']);
        });
    });

    Route::middleware('has.set.pin')->group(function () {
        Route::prefix('account')->group(function () {
            Route::post('deposit', [AccountController::class, 'deposit']);
            Route::post('withdraw', [AccountController::class, 'withdraw']);
//            Route::post('transfer', [TransferController::class, 'store']);
        });
        Route::prefix('transactions')->group(function () {
//            Route::get('history', [TransactionController::class, 'index']);
        });
    });

    Route::get('posts',[PostController::class,'getPosts']);
    Route::get('posts/{id}',[PostController::class,'show']);
    Route::get('/client/posts',[PostController::class,'loadMorePost']);
    Route::post('posts',[PostController::class,'store']);
    Route::put('posts/{id}',[PostController::class,'update']);
    Route::delete('posts/{id}',[PostController::class,'destroy']);
    Route::post('posts/upload-image',[PostController::class,'addImage']);
});


