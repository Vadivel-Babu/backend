<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'home']);
Route::get('/add', [EmployeeController::class, 'create'])->name('add');
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::delete('/remove/{id}', [EmployeeController::class, 'remove'])->name('remove');
Route::get('/users', [EmployeeController::class, 'index'])->name('allusers');
Route::put('/update/{id}', [EmployeeController::class, 'updateEmployee'])->name('update');
Route::get('/user/{id}', [EmployeeController::class, 'getEmployee'])->name('user');
