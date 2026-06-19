<?php

use App\Http\Controllers\keepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/keep', [KeepController::class, 'index'])->name('keep.index');

Route::get('/keep/create', [KeepController::class, 'create']) ->name('keep.create');

Route::post('/keep/create', [keepController::class, 'create']);

Route::delete('/keep/delete/{nota',
[keepController::class, 'delete']);


use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect('/tasks');
});

Route::resource('tasks', TaskController::class);

Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])
    ->name('tasks.toggle');

Route::delete('/tasks/{task}/image', [TaskController::class, 'removeImage'])
    ->name('tasks.removeImage');