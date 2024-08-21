<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [PersonController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('persons', PersonController::class);
Route::delete('/persons', [PersonController::class, 'destroyAll'])->name('persons.destroyAll');
Route::get('persons/{person}', [PersonController::class, 'show'])->name('persons.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
