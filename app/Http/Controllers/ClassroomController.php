<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Subject_class;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index($grade_id)
    {
        $gradeName = DB::table('grade')
        ->where('grade.id','=',$grade_id)
        ->select( 'grade_name')
        ->get();

        dd(session()->all());
        //
        $Classroom = DB::table('teacher_subject')
            ->join('teacher', 'teacher_subject.teacher_id', '=', 'teacher.id')
            ->join('subject', 'teacher_subject.subject_id', '=', 'subject.id')
            ->select( 'teacher_subject.*','subject.subject_name as sub', 'teacher.full_name as name')
            ->get();
        $teacher_class = DB::table('teacher_class')
            ->join('teacher', 'teacher_class.teacher_id', '=', 'teacher.id')
            ->join('class', 'teacher_class.class_id', '=', 'class.id')
            ->select( 'teacher_class.*','class.class_name as cls', 'teacher.full_name as name')
            ->get();    
       // $teacher_class = teacher_class::orderBy('id','desc')->get();
        $teacher = Teacher::orderBy('id','desc')->get();
        $subject = Subject::orderBy('id','desc')->get();
        $class = DB::table('class')
        ->where('grade_id','=',$grade_id)
        ->select( '*')
        ->get();
        dd($class);

        return view('Admin.EditGrade',compact('Classroom','teacher_class','teacher','subject','class','gradeName'));
    }
    public function Addgrade_class(Request $request)
    {
        $request->validate([
            'class_name'=>'required|unique:class',
            'teacher_id'=>'required',
        ]);
        $class_name = $request->grade_name.'-'.$request->class_name;
        $class_na = Classroom::where('class_name', '=', $class_name)->first();
        if (Classroom::where('class_name', '=',  $class_name)->exists()) {
            
            return back()->with('fail', 'Class name aleady exist');
        }
         else {
            $class_name = $request->grade_name.'-'.$request->class_name;
            $classroom = new Classroom;
            $classroom->class_name=$class_name;
            $classroom->grade_id=$request->grade_id;
            $classroom->teacher_id=$request->teacher_id;
            $classroom->admin_id=auth::user()->id;
            $classroom->save();
            
            $user_id=DB::table('teacher')
            ->where('id','=',$request->teacher_id)
            ->select('user_id')
            ->get();
    
            
            // DB::table('user')
            //     ->where('id',$user_id)
            //     ->update(['user_type' => 'class_teacher']);
    
            return back()->with('success', 'Class data  added');
    
           }
        }
        public function editgrade_class($grade_id,$class_id){
            $class=DB::table('class')
            ->where('id','=',$class_id)
            ->select('*')
            ->get();
            $subject=DB::table('subject')
            ->where('grade_id','=',$grade_id)
            ->select('*')
            ->get();
            $class_sub = DB::table('subject_class')
            ->where('subject_class.class_id','=',$class_id)
            ->join('subject', 'subject_class.subject_id', '=', 'subject.id')
            ->join('teacher_subject','teacher_subject.subject_id', '=', 'subject_class.subject_id')
            ->join('teacher', 'teacher_subject.teacher_id', '=', 'teacher.id')
            
            ->select( 'teacher_subject.*','subject.subject_name as sub', 'teacher.full_name as name')
            ->get();
            $classroom = DB::table('teacher_subject')
            ->join('teacher', 'teacher_subject.teacher_id', '=', 'teacher.id')
            ->join('subject', 'teacher_subject.subject_id', '=', 'subject.id')
            ->select( 'teacher_subject.*','subject.subject_name as sub', 'teacher.full_name as name')
            ->get();
           
            
           
            
            return view('Admin.editClass',compact('class','subject','classroom','class_sub'));
        }
        public function addclass_subject(Request $request){
            $subject_id=DB::table('teacher_subject')
            ->where('id','=',$request->subject_teacher_id)
            ->select('subject_id')
            ->get();
            if (Subject_class::where([['class_id','=',$request->class_id] , ['subject_id','=',$subject_id[0]->subject_id]])->exists()){
                return back()->with('fail', 'Subject name aleady exist');
            }
            else{
                
           
            $subclass = new Subject_class;
            $subclass->subject_id=$subject_id[0]->subject_id;
            $subclass->class_id = $request->class_id;
            $subclass->save();

        return redirect()->back()->with('success', 'Subject added to class');
            }
            
        }
    
}