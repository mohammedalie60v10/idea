<?php

declare(strict_types=1);

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaImageController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/idea');

Route::get('/idea', [IdeaController::class, 'index'])->name('idea.index')->middleware('auth');
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store')->middleware('auth');
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show')->middleware('auth');

Route::patch('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update')->middleware('auth');


Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy')->middleware('auth');
Route::delete('/idea/{idea}/featured-image', [IdeaImageController::class, 'destroy'])->name('idea.destroy.image')->middleware('auth');

//Route::patch('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.edit')->middleware('auth');
Route::patch('/steps/{step}', [StepController::class, 'update'])->name('step.update')->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware(['guest']);
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest']);

Route::get('/login', [SessionsController::class, 'create'])->name('login')->middleware(['guest']);
Route::post('/login', [SessionsController::class, 'store'])->middleware(['guest']);

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware(['auth']);
