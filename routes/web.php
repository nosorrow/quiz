<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QuizSolveController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('files');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/files', FileController::class)
    ->middleware(['auth', 'verified']);

Route::resource('user', UserController::class)
    ->middleware(['auth', 'verified']);

Route::post('/quiz/{quiz}/solve', [QuizSolveController::class, 'solve'])
    ->middleware(['auth', 'verified'])
    ->name('quiz.solve');

Route::get('/quiz/result', [QuizSolveController::class, 'showResult'])
    ->middleware(['auth', 'verified'])
    ->name('quiz.result');

Route::get('/quiz/{quiz}/history', [QuizSolveController::class, 'history'])
    ->middleware(['auth', 'verified'])
    ->name('quiz.history');

Route::resource('quizzes', QuizzesController::class)
    ->middleware(['auth', 'verified']);

Route::resource('questions', QuestionsController::class)
    ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
