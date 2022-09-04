<?php

namespace App\Http\Controllers;
use App\Models\Attentiveness_check;
use App\Models\Attentiveness_check_Question;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class Submit_attentiveness_checkController extends Controller
{
    public function index(Request $request,$classid,$subjectid)
    {

        $count=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->join('student','student_attentiveness_check.admission_no','=','student.admission_no')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->whereDate('attentiveness_check.date', '=', Carbon::now())
        ->distinct()
        ->count('student_attentiveness_check.A_check_id');
        //dd($count);


        $result=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->join('student','student_attentiveness_check.admission_no','=','student.admission_no')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->whereDate('attentiveness_check.date', '=', Carbon::now())
        ->select(DB::raw('sum(student_attentiveness_check.total_points) as sum'))
        ->first();

        $r=$result->sum;

        $quizes=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->whereDate('attentiveness_check.date', '=', Carbon::now())
        ->select('attentiveness_check.id','attentiveness_check.title','attentiveness_check.date','attentiveness_check.quiz_duration','attentiveness_check.uploaded_time',DB::raw('count(*) as count'))
        ->groupBy('attentiveness_check.id','attentiveness_check.title','attentiveness_check.date','attentiveness_check.quiz_duration','attentiveness_check.uploaded_time')
        ->get();
//dd($quizes);
        $hmark=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->join('student','student_attentiveness_check.admission_no','=','student.admission_no')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->whereDate('attentiveness_check.date', '=', Carbon::now())
        ->select(DB::raw('max(student_attentiveness_check.total_points) as max'),'attentiveness_check.title','attentiveness_check.uploaded_time')
        ->groupBy('attentiveness_check.title','attentiveness_check.uploaded_time')
        ->paginate(5);

        $std=DB::table('student')
        ->where('student.class_id',$classid)
        ->count('student.admission_no');
        $at=0;
        foreach($quizes as $a){
            $at=$at+$a->count;
        }
      //dd($at);
        $d=DB::table('subject_class')
        ->where('subject_class.class_id','=',$classid)
        ->where('subject_class.subject_id','=',$subjectid)
        ->join('subject','subject.id','=','subject_class.subject_id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject_name as subject','class_name as class','class.id as classid','subject.id as subjectid')
        ->first();

        return view('teacher.Attentive_Quiz.Submited_attentive_view',compact(['quizes','classid','subjectid','hmark','std','count','at','r','d']));





    }
    public function sub_attentiveview(Request $request,$id)
    {
        $search=$request->search;
        $sub=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->join('student','student_attentiveness_check.admission_no','=','student.admission_no')
        ->select('student_attentiveness_check.admission_no as admision_no','student_attentiveness_check.A_check_id as id','student.full_name as name','student_attentiveness_check.created_at','student_attentiveness_check.total_points as marks')
        ->where('student_attentiveness_check.A_check_id',$id)
        ->where(function($query) use ($search){
            $query->where('student.full_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('student_attentiveness_check.admission_no', 'LIKE', '%'.$search.'%')
                    ->orWhere('student.full_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('student_attentiveness_check.total_points', 'LIKE', '%'.$search.'%');
        })
        ->paginate(15);

        $hm=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->join('student','student.admission_no','=','student_attentiveness_check.admission_no')
        ->select('student_attentiveness_check.id as id','student.full_name','student.admission_no','student_attentiveness_check.total_points','student_attentiveness_check.created_at as uploaded_time')
        ->where('student_attentiveness_check.A_check_id',$id)
        ->orderBy('student_attentiveness_check.total_points','desc')
        ->limit(10)
        ->paginate(5);

        $nums=DB::table('student_attentiveness_check')
        ->where('student_attentiveness_check.A_check_id',$id)
        ->count('student_attentiveness_check.admission_no');

        $p=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->join('student','student.admission_no','=','student_attentiveness_check.admission_no')
        ->where('student_attentiveness_check.A_check_id',$id)
        ->select('attentiveness_check.uploaded_time',DB::raw('count(*) as count'))
        ->groupBy('attentiveness_check.quiz_duration','attentiveness_check.uploaded_time')
        ->first();


        $classid=DB::table('student_attentiveness_check')
        ->join('student','student.admission_no','=','student_attentiveness_check.admission_no')
        ->where('student_attentiveness_check.A_check_id',$id)
        ->select('student.class_id')
        ->first();

        $std=DB::table('student')
        ->where('student.class_id',$classid->class_id)
        ->select('student.admission_no')
        ->count();

        $abs=$std-$nums;


        $sum=DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->join('student','student_attentiveness_check.admission_no','=','student.admission_no')
        ->where('student_attentiveness_check.A_check_id',$id)
        ->select(DB::raw('sum(student_attentiveness_check.total_points) as sum'),'attentiveness_check.uploaded_time')
        ->groupBy('attentiveness_check.uploaded_time')
        ->first();
        //dd($hmark);

        $title= DB::table('student_attentiveness_check')
        ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
        ->where('student_attentiveness_check.A_check_id',$id)
        ->select('attentiveness_check.title')
        ->first();
        // dd($title);

        return view('teacher.Attentive_Quiz.submited_attentive_students',compact(['sub','hm','nums','p','std','abs','sum','title']));
    }
}
