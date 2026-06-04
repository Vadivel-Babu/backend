<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'home']);
Route::get('/users', [EmployeeController::class, 'index']);
Route::get('/user/{id}', [EmployeeController::class, 'getEmployee'])->name('user');
