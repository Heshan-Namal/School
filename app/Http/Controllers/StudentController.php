<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Quiz;
use App\Models\Assignment;
use App\Models\Questions;
use App\Models\Subject;
use App\Models\student_assignment;
use App\Models\Student_quiz;
use App\Models\relink;
use App\Services\GlobalDataService;
use App\GlobalServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

class StudentController extends Controller
{   
    private $GlobalDataService;
    public function __construct(GlobalDataService $globalData) {
        $this->globalData = $globalData;
    }
    public function index()
    {
        $student=$this->globalData->getGlobalData();

        return view('index');
    }
    public function addstudent(Request $req)
    {
        $req->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'admin_id'=>'required',
            'grade_id'=>'required',
            'class_id'=>'required'
        ]);

        $student=new student();
        $student->id=$req->id;
        $student->name=$req->name; 
        $student->email=$req->email;
        $student->password=$req->password;
        $student->admin_id=$req->admin_id;
        $student->grade_id=$req->grade_id;
        $student->class_id=$req->class_id;
        $student->save();
        return $student;
    }
    public function updatestudent(Request $req,$student_id)
    {
        
        $req->validate([
            'id'=>'required',
            'name'=>'required'
            
        ]);
        $student=Student::find($student_id);
        $student->id=$req->get('id');
        $student->name=$req->get('name'); 
        $student->email=$req->get('email');
        $student->password=$req->get('password');
        $student->admin_id=$req->get('admin_id');
        $student->grade_id=$req->get('grade_id');
        $student->class_id=$req->get('class_id');

        $student->save();
        return $student;
    }
    public function destroy_a_student($student_id){
        $student=Student::find($student_id);
        return $student->delete();
    }
    // using admin id
    public function getadmin_createstudents($student_id)
    {
        return Admin::find($student_id)->getstudents;
    }
    public function getgradestudents($student_id)
    {
        return Grade::find($student_id)->getstudents;
    }
    public function getclassstudents($student_id)
    {
        return Classroom::find($student_id)->getstudents;
    }

    public function getSubjectsList($student_id)
    {
        $data=DB::table('Student')
        ->where('Student.id','=',$student_id)
        ->join('Class','Class.id','=','Student.class_id')
        ->join('Subject_class','Subject_class.class_id','=','Class.id')
        ->join('Subject','Subject.id','=','Subject_class.subject_id')
        ->select('Subject.name as subject','Subject.id as subject_id','Class.name as class','Class.id as class_id')
        ->orderBy('subject_id','desc')
        ->get();
        return view('Student.student_subject.mysubjects',compact('data'));
    }

    public function getSubjectData($class_id,$subject_id)
    {
        $data = Subject::where('id',$subject_id)->get();
        return view('student_subject.subject',compact(['data','class_id','subject_id']));
    }  


    // student_quiz 

    public function getquizList($class_id,$subject_id) //class_id,subject_id
    {
    
        $quizList = DB::table('Quiz')
                            ->select(['Quiz.*','Subject.name'])
                            ->join('class', 'class.id', '=', 'Quiz.class_id')
                            ->join('Subject', 'Subject.id', '=', 'Quiz.subject_id')
                            ->where('class_id',$class_id)
                            ->where('subject_id',$subject_id)
                            ->orderBy('Quiz.id','desc')
                            ->get();

        $student=$this->globalData->getGlobalData();
        $student_id=$student[0]['id'];

        $completed_quizes=DB::table('Student_quiz')
                            ->join('Quiz','Quiz.id', '=', 'Student_quiz.quiz_id')
                            ->where('student_id',$student_id)
                            ->select('Quiz.id as id','marks','student_id')
                            ->get();
        $quizListarr=json_decode(json_encode($quizList), true); 
        $completed_quizesarr=json_decode(json_encode($completed_quizes), true);

        if(empty($completed_quizesarr)) $completed_quizesarr=Null;

        $attemptedquizarr=array();

        if(isset($completed_quizesarr)){
            foreach ($quizListarr as $key1 => $value1) {
               foreach ($completed_quizesarr as $key2 => $value2) {
                    if ($quizListarr[$key1]['id']==$completed_quizesarr[$key2]['id']) {
                        $attemptedquizarr[]=array_merge($quizListarr[$key1],$completed_quizesarr[$key2]);
                        unset($quizListarr[$key1]);
                        break;
                    }
                }
            }
        }

        if(empty($attemptedquizarr)) $attemptedquizarr=Null;        
        if(empty($quizListarr)) $quizListarr=Null;

        return view('student_quiz.quizList',compact(['quizList','class_id','subject_id','quizListarr','attemptedquizarr']));
    }

    public function showquiz($quiz_id) //class_id,subject_id
    {
        $quiz=Quiz::find($quiz_id);
        $questions=Questions::where('quiz_id',$quiz_id)->get();
         return view('student_quiz.quiz',compact(['quiz','questions','quiz_id'])); 
    }



    public function checkquiz(Request $request,$quiz_id)
    {
        $marks=0;
        $marks_per_q=5;
        $quiz=Quiz::find($quiz_id);
        $questions=Questions::where('quiz_id',$quiz_id)->get();
        $student=$this->globalData->getGlobalData();
        $student_id=$student[0]['id'];

        $data = $request->all();
        $answers_array = [];
        $correct_answers_array = $questions->pluck('correct_answer')->toArray();
        $question_count = 0;

        foreach ($data as $key => $datum) {
            if($key != '_token' && $key != 'invisible') {
                $answers_array[$key] = $datum;
                $question_count++;
            }
        }

        $marks=count( array_intersect_assoc($correct_answers_array,$answers_array))*$marks_per_q;
        $question_count*=$marks_per_q;

        $quizrecord=Student_quiz::where(['student_id',$student_id],['quiz_id',$quiz_id]);
        // dd($quizrecord);
        // if () {
        //     # code...
        // }

        Student_quiz::create(
            [
                'student_id'=>$student_id,
                'quiz_id'=>$quiz_id,
                'marks'=>$marks
            ]
        );

        $completed_quiz=Student_quiz::where('student_id',$student_id)->get();


        return view('student_quiz.quizresult',compact(['quiz','questions','marks','data','answers_array','correct_answers_array','question_count']));
    }


    // student_assignment

    public function getAssignmentList($class_id,$subject_id)
    {
        $assignmentList = DB::table('Assignment')
                        ->join('class','class.id', '=', 'Assignment.class_id')
                        ->join('Subject','Subject.id', '=', 'Assignment.subject_id')
                        ->join('Teacher','Teacher.id', '=', 'Assignment.teacher_id')
                        ->where('class_id',$class_id)
                        ->where('subject_id',$subject_id)
                        ->select(['Assignment.*','Subject.name as subject','Class.name as class','Teacher.name as teacher'])
                        ->get();

        $student=$this->globalData->getGlobalData();
        $student_id=$student[0]['id'];

        $uploaded_assignments=DB::table('Assignment_student')
                                ->join('Assignment','Assignment.id', '=', 'Assignment_student.assignment_id')
                                ->where('student_id',$student_id)
                                ->select('Assignment.id as id','Assignment_student.status as grading_status','grade','student_id')
                                ->get();

        $assignmentListarr=json_decode(json_encode($assignmentList), true); 
        $uploaded_assignmentsarr=json_decode(json_encode($uploaded_assignments), true);

        if(empty($uploaded_assignmentsarr)) $uploaded_assignmentsarr=Null;
        
        $mergedAssList=array();
 
        if(isset($uploaded_assignmentsarr)){
            foreach ($assignmentListarr as $key1 => $value1) {
               foreach ($uploaded_assignmentsarr as $key2 => $value2) {
                    if ($assignmentListarr[$key1]['id']==$uploaded_assignmentsarr[$key2]['id']) {
                        $mergedAssList[]=array_merge($assignmentListarr[$key1],$uploaded_assignmentsarr[$key2]);
                        unset($assignmentListarr[$key1]);
                        break;
                    }
                }            
            }
        }
        if(empty($mergedAssList)) $mergedAssList=Null;        
        if(empty($assignmentListarr)) $assignmentListarr=Null;
        return view('student_assignment.assignments',compact(['assignmentList','assignmentListarr','class_id','subject_id','uploaded_assignmentsarr','mergedAssList']));
    }
    


    public function uploadHomework($class_id,$subject_id,$assignment_id)
    {
        $class_id=$class_id;
        $subject_id=$subject_id;
        $assignment=Assignment::find($assignment_id);    
        return view('student_assignment.uploadHomework',compact(['assignment_id','assignment','class_id','subject_id']));
    }

 
    public function editHomework(Request $request,$class_id,$subject_id,$assignment_id)
    {
        $class_id=$class_id;
        $subject_id=$subject_id;
        $student=$this->globalData->getGlobalData();
        $student_id=$student[0]['id'];
        $assignment=Assignment::find($assignment_id);
        $uploaded_assignment=student_assignment::where([['assignment_id',$assignment_id],['student_id',$student_id]])->first();
        return view('student_assignment.editHomework',compact(['assignment_id','assignment','class_id','subject_id','uploaded_assignment']));

    }


    public function storeHomework(Request $request,$class_id,$subject_id,$assignment_id)
    {
         
        $validatedData = $request->validate([
         'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
 
        ]);
        $student=$this->globalData->getGlobalData();
        $student_id=$student[0]['id'];
 
        $submission=student_assignment::where([['assignment_id',$assignment_id],['student_id',$student_id]])->first();

        $name = $request->name;
        $filename=$request->file('file')->getClientOriginalName();
        $path = $request->file('file')->move('submissions',$filename);
        
        if (isset($submission)) {
            $submission->submission_name=$name;
            $submission->submission_path=$path;
            $submission->save();
            return redirect()->route('student.homeworklist',[$class_id,$subject_id])->with('message', 'submission Has been updated successfully');
        
        }else{

            student_assignment::create(
                [
                    'assignment_id'=>$assignment_id,
                    'student_id'=>$student_id,
                    'status'=>'submitted',
                    'submission_name'=>$name,
                    'submission_path'=>$path
                ]
            );
            return redirect()->route('student.homeworklist',[$class_id,$subject_id])->with('message', 'File Has been uploaded successfully');
        }

 
    }
    public function getRecordingslist($class_id,$subject_id)
    {
        $recordings=relink::where([['class_id',$class_id],['subject_id',$subject_id]])->orderByDesc('date')->get();
        return view('student_relink.relinklist',compact(['recordings','class_id','subject_id']));
    }
}
