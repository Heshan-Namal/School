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
        $user_id=DB::table('student')
        ->where('student.admission_no',$id)
        ->get('user_id');

        $user_type=DB::table('user')
        ->where('id','=',$user_id[0]->user_id)
        ->select('user_type')
        ->get();
        

        $result=DB::table('student')
            ->join('grade','grade.id','=','student.grade_id')
            ->join('class','student.class_id','=','class.id')
            ->where('student.user_id','=',$user_id[0]->user_id)
            ->select('student.*','grade.grade_name as gname','class.class_name as cname')
            
            ->get();
            $result2=DB::table('user')
            ->where('id','=',$user_id[0]->user_id)
            ->select('email')
            ->get();

        $std=DB::table('student')
        ->where('student.admission_no',$user_id[0]->user_id)
        ->get();
        // dd($result);
        return view('class_teacher.student_view',compact(['std','id','result','result2']));
    }
    
}