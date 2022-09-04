<?php

namespace App\Http\Controllers;

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
        $class = Classroom::orderBy('id','desc')->get();

        return view('Admin.EditGrade',compact('Classroom','teacher_class','teacher','subject','class','gradeName'));
    }
}