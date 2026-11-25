<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // user controller
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/setting', [UserController::class, 'updateUserProfile']);

        Route::apiResources(['posts' => PostController::class, 'posts.comments' => CommentController::class]);
        Route::post('/like/{post}', [LikeController::class, 'toggle']);
    });
});
