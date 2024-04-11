<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(TodoController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/todos/create', 'create')->name('todos.create');
    Route::post('/todos','store')->name('todos.store');
    Route::get('/todos/{id}/edit', 'edit')->name('todos.edit');
    Route::put('/todos/{id}', 'update');
    Route::delete('/todos/{id}', 'delete');
});
