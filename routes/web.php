<?php

use App\Http\Controllers\EleveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Eleve
Route::get('/eleves', [EleveController::class, 'index'])->name('eleves.index');
Route::get('/eleves/create', [EleveController::class, 'create'])->name('eleves.create');
Route::post('/eleves', [EleveController::class, 'store'])->name('eleves.store');
