<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roleController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Grade_teacherController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\Teacher_classController;
use App\Http\Controllers\Teacher_roleController;
use App\Http\Controllers\Student_subjectController;
use App\Http\Controllers\Subject_teacherController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\AssController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;

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
Route::get('/addstd', function () {
    return view('Admin.addStudent');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();   //Auth route


Route::group(['middleware' => 'auth'], function () {


    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    //Student-Subject route
    Route::get('/mysubjects/{student_id}',[StudentController::class,'getSubjectsList'])->name('Student.student_subject.mysubjects');

});
