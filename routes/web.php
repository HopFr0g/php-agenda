<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');

Route::post('/tasks'/* esta ruta se puede cambiar a futuro */, [TasksController::class, 'store'])->name('tasks');

Route::get('/tasks/{id}', [TasksController::class, 'show'])->name('tasks-edit');
Route::patch('/tasks/{id}', [TasksController::class, 'update'])->name('tasks-update');

Route::delete('/tasks/{id}', [TasksController::class, 'destroy'])->name('tasks-destroy');