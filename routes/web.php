<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Grade_teacherController;
use App\Http\Controllers\Teacher_classController;
use App\Http\Controllers\Student_subjectController;
use App\Http\Controllers\Subject_teacherController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\Submit_assesmentController;
use App\Http\Controllers\AssesmentController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\Attentiveness_checkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResourcesController;

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


// teacher routes
Route::get('/subjects',[TeacherController::class,'mySubjects'])->name('teacher.subjects');
Route::get('/materials/{classid}/{subjectid}',[TeacherController::class,'teacherMaterials'])->name('teacher.materials');
Route::get('/assesments/{classid}/{subjectid}',[AssesmentController::class,'index'])->name('ass.index');
Route::post('/store/{classid}/{subjectid}',[AssesmentController::class,'store'])->name('ass.store');
Route::get('/assesmentquiz',[AssesmentController::class,'assquiz'])->name('ass.quiz');
Route::put('/update',[AssesmentController::class,'assquestion_update'])->name('assquestion.update');
Route::get('/assesmentshow/{id}',[AssesmentController::class,'assquizshow'])->name('ass.quizshow');
Route::get('/submited/{classid}/{subjectid}',[Submit_assesmentController::class,'index'])->name('ass.sumitindex');
Route::get('/submitedview/{assid}',[Submit_assesmentController::class,'subassview'])->name('submit.view');
Route::get('/res/{classid}/{subjectid}',[ResourcesController::class,'index'])->name('res.index');
Route::post('/res/{classid}/{subjectid}/store',[ResourcesController::class,'store'])->name('res.store');
Route::get('/Attentiveness_check/{classid}/{subjectid}',[Attentiveness_checkController::class,'index'])->name('quiz.index');
Route::post('/attentive-store/{classid}/{subjectid}',[Attentiveness_checkController::class,'store'])->name('quiz.store');
//notdone
Route::get('/attentive-show/{classid}/{subjectid}/{quizid}',[Attentiveness_checkController::class,'show'])->name('quiz.show');
Route::post('/attentive-questionstore',[QuestionsController::class,'store'])->name('question.store');


// Route::middleware(['auth','teacher'])->group(function (){
//     Route::get('exams/active', 'ExamController@indexActive');
//     Route::get('school/sections','SectionController@index');
//   });

