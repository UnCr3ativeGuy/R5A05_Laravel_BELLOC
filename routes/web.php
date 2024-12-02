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
});

Route::middleware(['auth', 'can:manage-eleves'])->group(function () {
    Route::get('eleves/create', [EleveController::class, 'create'])->name('eleves.create');
    Route::post('eleves', [EleveController::class, 'store'])->name('eleves.store');
    Route::get('eleves/{eleve}/edit', [EleveController::class, 'edit'])->name('eleves.edit');
    Route::put('eleves/{eleve}', [EleveController::class, 'update'])->name('eleves.update');
    Route::delete('eleves/{eleve}', [EleveController::class, 'destroy'])->name('eleves.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
});

Route::middleware(['auth', 'can:manage-modules'])->group(function () {
    Route::get('modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('evaluations.show');
});

Route::middleware(['auth', 'can:manage-evaluations'])->group(function () {
    Route::get('evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('evaluations/{evaluation}/edit', [EvaluationController::class, 'edit'])->name('evaluations.edit');
    Route::put('evaluations/{evaluation}', [EvaluationController::class, 'update'])->name('evaluations.update');
    Route::delete('evaluations/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('evaluationEleve', [EvaluationEleveController::class, 'index'])->name('evaluationEleve.index');
    Route::get('evaluationEleve/{evaluationEleve}', [EvaluationEleveController::class, 'show'])->name('evaluationEleve.show');
});

Route::middleware(['auth', 'can:manage-evaluationEleve'])->group(function () {
    Route::get('evaluationEleve/create', [EvaluationEleveController::class, 'create'])->name('evaluationEleve.create');
    Route::post('evaluationEleve', [EvaluationEleveController::class, 'store'])->name('evaluationEleve.store');
    Route::get('evaluationEleve/{evaluationEleve}/edit', [EvaluationEleveController::class, 'edit'])->name('evaluationEleve.edit');
    Route::put('evaluationEleve/{evaluationEleve}', [EvaluationEleveController::class, 'update'])->name('evaluationEleve.update');
    Route::delete('evaluationEleve/{evaluationEleve}', [EvaluationEleveController::class, 'destroy'])->name('evaluationEleve.destroy');
});

//Notes
Route::get('/notes/evaluation/{id}', [NotesController::class, 'showEvaluation'])->name('notes.evaluation');
Route::get('/notes/eleve/{id}', [NotesController::class, 'showEleve'])->name('notes.eleve');
Route::get('/notes/insuffisants/{id}', [NotesController::class, 'showInsuffisants'])->name('notes.insuffisants');

require __DIR__.'/auth.php';
