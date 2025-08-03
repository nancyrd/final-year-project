<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;

use App\Http\Controllers\PreAssessmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostAssessmentController;
use App\Http\Controllers\QuizController;

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');


      Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');

    // Pre-assessment (for each level)
     Route::post('/levels/{level}/pre-assessment', [PreAssessmentController::class, 'submit'])->name('levels.pre-assessment.submit');

    // Change this route to handle POST requests as well
    Route::post('/levels/{level}/lesson', [LessonController::class, 'submit'])->name('levels.lesson.submit');

    // Post-assessment (for each level)
    Route::get('/levels/{level}/post-assessment', [PostAssessmentController::class, 'show'])->name('levels.post-assessment');
    Route::get('/pre-assessment', [QuizController::class, 'showPreAssessment'])->name('pre-assessment');
    
    // Submit the pre-assessment quiz
    Route::post('/pre-assessment', [QuizController::class, 'submitPreAssessment']);

    

});
Route::get('/progress', function () {
    return view('progress');
})->middleware(['auth'])->name('progress');
Route::get('/help', function () {
    return view('help');
})->middleware(['auth'])->name('help');
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

require __DIR__.'/auth.php';
