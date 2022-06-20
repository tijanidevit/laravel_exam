<?php

use App\Http\Controllers\ExamController;
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

Route::get('/', [DashboardController::class, 'renderDashboard'])->name('dashboard');
Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
Route::get('/exams/new', [ExamController::class, 'create'])->name('exams.create');
Route::get('/exams/{exam}', [ExamController::class, 'show'])->name('exams.show');
Route::get('/exams/{exam}/edit', [ExamController::class, 'edit'])->name('exams.edit');
Route::patch('/exams/{exam}', [ExamController::class, 'update'])->name('exams.update');
Route::delete('/exams/{exam}', [ExamController::class, 'destroy'])->name('exams.delete');
