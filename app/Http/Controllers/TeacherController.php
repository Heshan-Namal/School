<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function mySubjects(){
        $data=DB::table('teacher_subject')
        ->where('teacher_subject.teacher_id','=',Auth::user()->id)
        ->join('subject','subject.id','=','teacher_subject.subject_id')
        ->join('subject_class','subject_class.subject_id','=','subject.id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject.subject_name as subject','class.class_name as class','class.id as classid','subject.id as subjectid')
        ->orderBy('class.class_name')
        ->get();
       // dd(Auth::user()->id);
        return view('teacher.subjects',compact('data'));

    }

    public function teacherMaterials($classid,$subjectid)
    {

        return view('teacher.material',compact(['classid','subjectid']));
    }
}
