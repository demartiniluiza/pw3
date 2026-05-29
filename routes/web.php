<?php

use App\Http\Controllers\keepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/keep', [KeepController::class, 'index'])->name('keep.index');

Route::get('/keep/create', [KeepController::class, 'create']) ->name('keep.create');

Route::post('/keep/create', [keepController::class, 'create']);