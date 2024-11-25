<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;


Route::get('/', function () {
    return view('welcome');
});

//Module
Route::resource('modules', ModuleController::class);

//Evaluation
Route::resource('evaluations', EvaluationController::class);

//EvaluationEleve
Route::resource('evaluationEleve', EvaluationEleveController::class);

//Notes
Route::get('/notes/evaluation/{id}', [NotesController::class, 'showEvaluation'])->name('notes.evaluation');
Route::get('/notes/eleve/{id}', [NotesController::class, 'showEleve'])->name('notes.eleve');
Route::get('/notes/insuffisants/{id}', [NotesController::class, 'showInsuffisants'])->name('notes.insuffisants');


//Eleve
Route::resource('eleves', EleveController::class);

//Route::get('/eleves', [EleveController::class, 'index'])->name('eleves.index');
//Route::delete('/eleves/{id}', [EleveController::class, 'destroy'])->name('eleves.destroy');
//Route::get('/eleves/{id}/edit', [EleveController::class, 'edit'])->name('eleves.edit');
//Route::put('/eleves/{id}', [EleveController::class, 'update'])->name('eleves.update');
//Route::get('/eleves/{id}', [EleveController::class, 'show'])->name('eleves.show');
//Route::get('/eleves/create', [EleveController::class, 'create'])->name('eleves.create');
//Route::post('/eleves', [EleveController::class, 'store'])->name('eleves.store');
