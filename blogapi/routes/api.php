<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// comment routes
Route::controller(CommentController::class)->group(function () {
    Route::get('/comment', 'index');
    Route::post('/comment', 'store');
    Route::put('/comment/{id}', 'update');
    Route::delete('/comment/{id}', 'destroy');
});

// posts routes
Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'index');
    Route::get('/post/{id}', 'getPostById');
    Route::post('/post', 'store');
    Route::put('/post/{id}', 'update');
    Route::delete('/post/{id}', 'destroy');
});

// like routes
Route::controller(PostController::class)->group(function () {
    Route::post('/post', 'handleLike');
});
