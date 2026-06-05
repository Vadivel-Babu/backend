<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::post('/', [TodoController::class, 'store'])->name('todos.store');
Route::get('/create', function () {
    return view('form');
});
Route::get('/edit/{id}', [TodoController::class, 'getTodo'])->name('edit');
Route::put('/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/{id}', [TodoController::class, 'destroy'])->name('todo.delete');
