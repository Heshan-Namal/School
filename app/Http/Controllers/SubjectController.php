<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Teacher_subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function Addgrade_subject(Request $request)
    {
        //
        $request->validate([
            'subject_name'=>'required',
            'teacher_id'=>'required',
        ]);
        $subject = new Subject;
        $subject->subject_name=$request->subject_name;
        $subject->grade_id=$request->grade_id;
        $subject->admin_id=auth::user()->id;
        $subject->save();
        
        $subject_id=DB::table('subject')
        ->where('subject_name','=',$request->subject_name)
        ->select('id')
        ->get();

        $teacher = new Teacher_subject;
        $teacher -> teacher_id =$request->teacher_id;
        $teacher -> subject_id =$subject_id[0]->id;

        if ( $teacher->save() ) {

            return back()->with('success', 'Data added successfully');
    
           } else {
               
            return back()->with('error', 'Data failed to add');
    
           }
        }
}