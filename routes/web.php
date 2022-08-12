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
use App\Http\Controllers\Submit_attentiveness_checkController;
use App\Http\Controllers\Attentiveness_checkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\Teacher_RecordBookController;
use App\Http\Controllers\ClassTeacherController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TermController;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\CustomAuthController;
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

Route::get('/edit', function () {
    return view('Profile.editprofile');
});
Route::get('/time', function () {
    return view('Timetable.viewtimetable');
});


Route::get('/', function () {
    return view('welcome');
});

 Route::get('/password/reset/link', [ForgotPasswordController::class,'password_reset_link'])->name('passwords.reset.link');
 Route::post('/password/reset2', [ForgotPasswordController::class,'password_reset'])->name('password_reset');
 Route::get('/password/resets/{remember_token}', [ForgotPasswordController::class,'Show_reset_form'])->name('passwords.reset.form');
 Route::post('/password/change', [ForgotPasswordController::class,'Change_password'])->name('change.password');

 Auth::routes();   //Auth route


Route::group(['middleware' => 'auth'], function () {

    // Route::post('/userlogout', [CustomAuthController::class,'signOut'])->name('user.logout');

    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/', [HomeController::class,'back'])->name('back');


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

         //admin routes
        Route::group(['prefix' => 'grade'], function(){
            Route::get('/add',[AdminController::class,'CreatNewGrade'])->name('admin.grade');
            Route::post('/AddGrade',[AdminController::class,'AddGrade']);
            Route::post('/AddClass',[AdminController::class,'AddClass']);
            Route::post('/DeleteGrade/{id}',[AdminController::class,'DeleteGrade'])->name('admin.Delete');
        });

        Route::group(['prefix' => 'teacher'], function(){
            Route::post('/AddTeacher',[AdminController::class,'AddTeacher']);

        });
        Route::group(['prefix' => 'student'], function(){

            Route::post('/AddStudent',[AdminController::class,'AddStudent']);

        });
        Route::get('grade/AddNewClass',[AdminController::class,'AddNewClass'])->name('admin.class');
        Route::get('/addteacher',[AdminController::class,'AddNewTeacher'])->name('admin.teacher');
        Route::get('/addstudent',[AdminController::class,'AddNewStudent'])->name('admin.student');
        Route::get('/SelectGrade',[AdminController::class,'SelectGrade']);

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
Route::put('/marks/{id}',[Submit_assesmentController::class,'updatemarks'])->name('update.marks');
Route::get('/res/{classid}/{subjectid}',[ResourcesController::class,'index'])->name('res.index');
Route::post('/res/{classid}/{subjectid}/store',[ResourcesController::class,'store'])->name('res.store');
Route::get('/Attentiveness_check/{classid}/{subjectid}',[Attentiveness_checkController::class,'index'])->name('quiz.index');
Route::post('/attentive-store/{classid}/{subjectid}',[Attentiveness_checkController::class,'store'])->name('quiz.store');
Route::post('/attentive-questionstore',[Attentiveness_checkController::class,'qstore'])->name('question.store');
Route::post('/change/{id}',[Attentiveness_checkController::class,'changeStatus'])->name('attentive.status');
Route::get('/attentiveshow/{id}',[Attentiveness_checkController::class,'attentiveshow'])->name('att.quizshow');
Route::get('/attentive-submited/{classid}/{subjectid}',[Submit_attentiveness_checkController::class,'index'])->name('attentive.sumitindex');
Route::get('/student-submitedview/{assid}',[Submit_attentiveness_checkController::class,'sub_attentiveview'])->name('attentive-submit');
Route::post('/ass/{id}',[AssesmentController::class,'changeStatus'])->name('ass.status');
Route::put('/ass_update',[AssesmentController::class,'assessmentupdate'])->name('ass.update');
Route::get('/students/{classid}/{subjectid}',[TeacherController::class,'mystudents'])->name('class.students');
Route::get('/record-book/{classid}/{subjectid}',[Teacher_RecordBookController::class,'index'])->name('class.recordbook');
Route::post('/recordstore/{classid}/{subjectid}',[Teacher_RecordBookController::class,'store'])->name('record.store');
Route::put('/record_update/{classid}/{subjectid}',[Teacher_RecordBookController::class,'update'])->name('rec.update');
Route::put('/att_update',[Attentiveness_checkController::class,'attupdate'])->name('att.update');
Route::delete('destroy_att',[Attentiveness_checkController::class,'destroy_att'])->name('att.delete');
Route::delete('destroy_ass',[AssesmentController::class,'destroy_ass'])->name('ass.delete');
Route::delete('destroy_assquestion',[AssesmentController::class,'destroy_assq'])->name('assque.delete');
Route::put('/res_update',[ResourcesController::class,'resupdate'])->name('res.update');
Route::delete('destroy_res',[ResourcesController::class,'destroy_res'])->name('res.delete');
Route::delete('destroy_attquestion',[Attentiveness_checkController::class,'destroy_attq'])->name('attque.delete');
//reports
Route::get('std/export/{classid}/{subjectid}', [TeacherController::class, 'export'])->name('std.export');
Route::get('std/exportpdf/{classid}/{subjectid}', [TeacherController::class, 'exportpdf'])->name('std.exportpdf');
Route::get('rec/export/{classid}/{subjectid}/{term}', [Teacher_RecordBookController::class, 'export'])->name('rec.export');
Route::get('rec/exportpdf/{classid}/{subjectid}/{term}', [Teacher_RecordBookController::class, 'exportpdf'])->name('rec.exportpdf');

//classteacher
Route::get('/myclass-students',[ClassTeacherController::class,'mystudents'])->name('myclass.students');
Route::get('student-detail/{id}',[ClassTeacherController::class,'student_view'])->name('myclass.studentview');
Route::get('/myclass-termtest',[TermController::class,'termtest'])->name('myclass.termtest');
Route::get('/termtest/{classid}',[TermController::class,'addtermtest'])->name('addresult');
Route::get('/stdres/{term}/{studentid}',[TermController::class,'addstd_result'])->name('stdresult');
Route::post('/result/{term}/{subjectid}/{classid}/store',[TermController::class,'store'])->name('enter.testmarks');
Route::put('/result-update/{term}/{subjectid}/{classid}',[TermController::class,'testupdate'])->name('update.testmarks');

//report
Route::get('result/exportpdf/{term}/{studentid}/{classid}', [TermController::class, 'exportpdf'])->name('resultpdf');


});




//Route::get('/attentive-show/{classid}/{subjectid}/{quizid}',[Attentiveness_checkController::class,'show'])->name('quiz.show');
//Route::post('/attentive-questionstore',[QuestionsController::class,'store'])->name('question.store');


// Route::middleware(['auth','teacher'])->group(function (){
//     Route::get('exams/active', 'ExamController@indexActive');
//     Route::get('school/sections','SectionController@index');
//   });


