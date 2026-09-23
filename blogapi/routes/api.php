<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/comment', [CommentController::class, 'index']);
Route::post('/comment', [CommentController::class, 'store']);
Route::put('/comment/{id}', [CommentController::class, 'update']);
Route::delete('/comment/{id}', [CommentController::class, 'destroy']);

Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'getPostById']);
Route::post('/post', [PostController::class, 'store']);
Route::put('/post/{id}', [PostController::class, 'update']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);
