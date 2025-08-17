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
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SupportController;






Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});
Route::get('/progress', function () {
    return view('progress');
})->middleware(['auth'])->name('progress');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');



//Help Center
Route::view('/support', 'support.index')->name('support');

Route::post('/support', [SupportController::class, 'submit'])
    ->name('support.submit')
    ->middleware('auth'); // optional: require login for contact form


Route::middleware(['auth'])->group(function () {
    // Pre-assessment routes
   // Route::get('/stage/{stage}/pre-assessment', [AssessmentController::class, 'showPreAssessment'])
  //      ->name('assessment.pre.show');
  //  Route::post('/stage/{stage}/pre-assessment', [AssessmentController::class, 'submitPreAssessment'])
  //      ->name('assessment.pre.submit');
    
//   // Stage routes
    Route::get('/stage/{stage}', [StageController::class, 'show'])
        ->name('stage.show');



       //     Route::get('/stage/{stage}/level/{level}', [LevelController::class, 'show'])
      //  ->name('level.show');



        Route::get('/stage/{stageName}/pre-assessment', [StageController::class, 'showPreAssessment'])
     ->name('stage.pre-assessment');
     Route::post('/stage/{stageName}/submit-assessment', [StageController::class, 'processAssessment'])
     ->name('stage.submit-assessment');
    
Route::get('/stage/{stage}/{level}', [StageController::class, 'showLevel'])
     ->name('stage.level');
});




Route::middleware(['auth', 'check.stage.access:variables'])->group(function () {
    Route::get('/stage/variables/pre-assessment', [StageController::class, 'showPreAssessment'])->name('stage.pre-assessment');
    Route::post('/stage/variables/submit-assessment', [StageController::class, 'submitAssessment']);
    Route::get('/stage/variables/{level}', [StageController::class, 'showLevel'])->name('stage.level');
    Route::post('/stage/variables/{level}/complete', [StageController::class, 'completeLevel']);
});


require __DIR__.'/auth.php';
