<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\DashboardController;
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

// Route::resource('exams', ExamController::class);

Route::get('/', [DashboardController::class, 'renderDashboard'])->name('dashboard');
Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
Route::get('/exams/new', [ExamController::class, 'create'])->name('exams.create');
Route::get('/exams/{exam}', [ExamController::class, 'show'])->name('exams.show');
Route::get('/exams/{exam}/edit', [ExamController::class, 'edit'])->name('exams.edit');
Route::patch('/exams/{exam}', [ExamController::class, 'update'])->name('exams.update');


Route::get('/exams/{exam}/questions/new', [ExamQuestionController::class, 'create'])->name('questions.create');
Route::get('/exams/questions/{exam}', [ExamQuestionController::class, 'show'])->name('questions.show');
Route::get('/exams/questions/{exam}/edit', [ExamQuestionController::class, 'edit'])->name('questions.edit');
Route::patch('/exams/questions/{exam}', [ExamQuestionController::class, 'update'])->name('questions.update');
Route::delete('/exams/questions/{exam}', [ExamQuestionController::class, 'destroy'])->name('questions.delete');
