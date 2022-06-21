<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamQuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('exams/',[ExamController::class, 'api_index']);
Route::post('exams/',[ExamController::class, 'store'])->name('api.store_exams');
Route::patch('exams/{exam}',[ExamController::class, 'update'])->name('api.update_exams');
Route::delete('/exams/{exam}', [ExamController::class, 'destroy'])->name('api.delete_exams');
Route::get('exams/limit/{limit}',[ExamController::class, 'api_limited_exams']);



Route::post('exams/{exam}/questions/',[ExamQuestionController::class, 'store'])->name('api.store_questions');
