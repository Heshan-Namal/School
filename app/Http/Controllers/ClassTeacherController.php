<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassTeacherController extends Controller
{
    public function mystudents(Request $request)
    {
        $myclass=DB::table('class')
        ->where('class.teacher_id',Auth::user()->id)
        ->select('class.class_name','class.id')
        ->first();

       // dd($data);

        $search=$request->search;
        $std=DB::table('student')
                ->where('student.class_id',$myclass->id)
                ->where(function($query) use ($search){
                    $query->where('student.admission_no', 'LIKE', '%'.$search.'%')
                            ->orWhere('student.full_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('student.guardian_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('student.guardian_email', 'LIKE', '%'.$search.'%');

                    })
                    ->paginate(15);

                //dd($std);
        return view('class_teacher.myclass_students',compact(['myclass','std']));
    }
    public function student_view($id)
    {

        $std=DB::table('student')
        ->where('student.admission_no',$id)
        ->get();
        // dd($std);
        return view('class_teacher.student_view',compact(['std','id']));
    }
}
