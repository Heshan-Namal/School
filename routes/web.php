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

    //Student routes
    Route::controller(StudentController::class)->group(function () {
        Route::get('/mysubjects/{student_id}','getSubjectsList')->name('Student.student_subject.mysubjects');
        Route::get('/subject/{class_id}/{subject_id}','getSubjectWeekList')->name('Student.student.subject_week');
        Route::get('/subject/{class_id}/{subject_id}/{term_id}/{week_id}','getSubjectWeekDayList')->name('Student.student.subject_week_day');
        //Route::get('/subject/{class_id}/{subject_id}','getSubjectData')->name('Student.student.subject');
        
        
        //student_assignment routes
        Route::get('/homework/{class_id}/{subject_id}','getAssignmentList')->name('Student.student.homeworklist');
        Route::get('/uploadHomework/{class_id}/{subject_id}/{assignment_id}','uploadHomework')->name('Student.student.uploadHomework');
        Route::get('/editHomework/{class_id}/{subject_id}/{assignment_id}','editHomework')->name('Student.student.editHomework');
        Route::post('/storeHomework/{class_id}/{subject_id}/{assignment_id}','storeHomework')->name('Student.student.storeHomework');
        
        //student_quiz routes
        Route::get('/myquizzes/{class_id}/{subject_id}/{term}/{week}/{day}','getquizList')->name('Student.student.quizlist');
        Route::get('/quiz/{quiz_id}','showquiz')->name('Student.student.showquiz');
        Route::post('/checkquiz/{quiz_id}','checkquiz')->name('Student.student.checkquiz');
        Route::get('/resultquiz/{quiz_id}','checkquiz')->name('Student.student.quizresult');
    });

});

