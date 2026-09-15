<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/apiusers', [EmployeeController::class, 'apiIndex']);
// Route::apiResource('posts', [EmployeeController::class, 'home']);
