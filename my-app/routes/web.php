<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [EmployeeController::class, 'home'])->name('home');
    Route::get('/add', [EmployeeController::class, 'create'])->name('add');
    Route::post('/store', [EmployeeController::class, 'store'])->name('store');
    Route::delete('/remove/{id}', [EmployeeController::class, 'remove'])->name('remove');
    Route::get('/users', [EmployeeController::class, 'index'])->name('allusers');
    Route::put('/update/{id}', [EmployeeController::class, 'updateEmployee'])->name('update');
    Route::get('/user/{id}', [EmployeeController::class, 'getEmployee'])->name('user');
});

Route::get('/register', [UserController::class, 'signup'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('user.register');
Route::get('/login', [UserController::class, 'signin'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout']);
