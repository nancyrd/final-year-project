<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');

});
Route::get('/progress', function () {
    return view('progress');
})->middleware(['auth'])->name('progress');
Route::get('/help', function () {
    return view('help');
})->middleware(['auth'])->name('help');

require __DIR__.'/auth.php';
