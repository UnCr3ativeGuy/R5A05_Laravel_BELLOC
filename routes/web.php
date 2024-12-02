<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('eleves', [EleveController::class, 'index'])->name('eleves.index');
    Route::get('eleves/{eleve}', [EleveController::class, 'show'])->name('eleves.show');

    Route::get('modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('modules/{module}', [ModuleController::class, 'show'])->name('modules.show');

    Route::get('evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('evaluations.show');

    Route::get('evaluationEleve', [EvaluationEleveController::class, 'index'])->name('evaluationEleve.index');
    Route::get('evaluationEleve/{evaluationEleve}', [EvaluationEleveController::class, 'show'])->name('evaluationEleve.show');
});

Route::middleware(['auth', 'can:prof'])->group(function () {
    Route::resource('eleves', ModuleController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('evaluations', ModuleController::class);
    Route::resource('evaluationEleve', ModuleController::class);
});

//Notes
Route::get('/notes/evaluation/{id}', [NotesController::class, 'showEvaluation'])->name('notes.evaluation');
Route::get('/notes/eleve/{id}', [NotesController::class, 'showEleve'])->name('notes.eleve');
Route::get('/notes/insuffisants/{id}', [NotesController::class, 'showInsuffisants'])->name('notes.insuffisants');

require __DIR__.'/auth.php';
