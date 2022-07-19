<?php

namespace App\Http\Controllers;
use App\Models\Assessment;
use App\Models\Student_assesment;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class Teacher_dashController extends Controller
{
    public function leader(Request $req)
    {
        if (($req->mindata == null) && ($req->maxdata == null)) {
            $mindata= Carbon::now()->subDays(7);
            $maxdata=Carbon::now()->addDays(7);
            //dd($maxdata);
            $leaders=DB::table('assessment')
                ->join('student_assessment','assessment.id','=','student_assessment.assessment_id')
                ->join('student','student_assessment.admission_no','=','student.admission_no')
                ->join('class','assessment.class_id','=','class.id')
                ->where('assessment.due_date','>',$mindata)
                ->where('assessment.due_date','<',$maxdata)
                ->select(DB::raw('max(student_assessment.assessment_marks) as max'),'assessment.id','class.class_name','assessment.title')
                ->groupBy('assessment.id','class.class_name','assessment.title')
                ->get();
        }else{
            $leaders=DB::table('assessment')
            ->join('student_assessment','assessment.id','=','student_assessment.assessment_id')
            ->join('student','student_assessment.admission_no','=','student.admission_no')
            ->join('class','assessment.class_id','=','class.id')
            ->where('assessment.due_date','>',$req->mindata)
            ->where('assessment.due_date','<',$req->maxdata)
            ->select(DB::raw('max(student_assessment.assessment_marks) as max'),'assessment.id','class.class_name','assessment.title')
            ->groupBy('assessment.id','class.class_name','assessment.title')
            ->get();
        }


        $data=DB::table('teacher_subject')
        ->where('teacher_subject.teacher_id','=',Auth::user()->id)
        ->join('subject','subject.id','=','teacher_subject.subject_id')
        ->join('subject_class','subject_class.subject_id','=','subject.id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject.subject_name as subject','class.class_name as class','class.id as classid','subject.id as subjectid')
        ->orderBy('class.class_name')
        ->get();
        //dd($leaders);

    //    $data=[];

    //     foreach ($leaders as $key => $l) {
    //         //dd($key);
    //         $a=DB::table('assessment')
    //             ->join('student_assessment','assessment.id','=','student_assessment.assessment_id')
    //             ->join('student','student_assessment.admission_no','=','student.admission_no')
    //             ->join('class','assessment.class_id','=','class.id')
    //             ->where('student_assessment.assessment_id','=',$l->id)
    //             ->where('student_assessment.assessment_marks','=',$l->max)
    //             ->select('student_assessment.admission_no','student.full_name','class.class_name','assessment.title','student_assessment.assessment_marks')
    //             ->get();
    //             dd($a);

    //         //    dd($a_count);

    //             $data[strval($key)] = [
    //                 'id' => $a[$i]->class_name,
    //                 'title' => $a[$i]->title,
    //                 'name' => $a[$i]->full_name,
    //                 'marks'=>$a[$i]->assessment_marks
    //             ];



    //     }
    return view('Dashboard.Teacherdashboard',compact(['leaders','data']));



    }
}
