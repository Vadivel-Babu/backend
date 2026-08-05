<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'home']);
Route::get('/add', [EmployeeController::class, 'create']);
Route::get('/users', [EmployeeController::class, 'index']);
Route::get('/user/{slug}', [EmployeeController::class, 'getEmployee'])->name('user');
