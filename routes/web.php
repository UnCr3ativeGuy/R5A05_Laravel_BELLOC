<?php

use App\Http\Controllers\EleveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Eleve
Route::resource('eleves', EleveController::class);
//Route::get('/eleves', [EleveController::class, 'index'])->name('eleves.index');
//Route::delete('/eleves/{id}', [EleveController::class, 'destroy'])->name('eleves.destroy');
//Route::get('/eleves/{id}/edit', [EleveController::class, 'edit'])->name('eleves.edit');
//Route::put('/eleves/{id}', [EleveController::class, 'update'])->name('eleves.update');
//Route::get('/eleves/{id}', [EleveController::class, 'show'])->name('eleves.show');
//Route::get('/eleves/create', [EleveController::class, 'create'])->name('eleves.create');
//Route::post('/eleves', [EleveController::class, 'store'])->name('eleves.store');
