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

        $detail=DB::table('subject_class')
        ->where('subject_class.class_id','=',$classid)
        ->where('subject_class.subject_id','=',$subjectid)
        ->join('subject','subject.id','=','subject_class.subject_id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject_name as subject','class_name as class','class.id as classid','subject.id as subjectid')
        ->get();
        return view('teacher.material',compact(['classid','subjectid','detail']));
    }
    public function mystudents($classid,$subjectid)
    {


        $std=DB::table('student')
                ->where('student.class_id',$classid)
                ->get();

                //dd($std);

        $ass=DB::table('assessment')
        ->where('assessment.class_id','=',$classid)
        ->where('assessment.subject_id','=',$subjectid)
        ->where('assessment.status','=','published')
        ->count();

        foreach ($std as $key => $s) {
            $a=DB::table('student_assessment')
                ->where('student_assessment.admission_no','=',$s->admission_no)
                ->select(DB::raw('sum(student_assessment.assessment_marks) as sum'),'student_assessment.admission_no')
                ->groupBy('student_assessment.admission_no')
                ->first();
            if(($ass!=null)){
                if($a==null){
                    $mar=0.0;
                    $mark[$s->admission_no]=$mar;
                }
                else{
                    $mar=(float)$a->sum/(float)$ass;//collection
                    $mark[$s->admission_no]=$mar;
                }
            }else{
                $mark[$s->admission_no]=0.0;
            }

        }

        // asort($mark);
        // dd($mark);




      // dd($k['s1']);

        foreach ($std as $key => $s) {
            $st_ass=DB::table('student_assessment')
            ->where('student_assessment.admission_no','=',$s->admission_no)
            ->count();

            if(($ass!=null)){
                $st_sub=((float)$st_ass/(float)$ass)*100;
                $sub[$s->admission_no]=$st_sub;
            }else{
                $sub[$s->admission_no]=0.0;
            }
        }
        //dd($sub);
        $ass=DB::table('assessment')
        ->where('assessment.class_id','=',$classid)
        ->where('assessment.subject_id','=',$subjectid)
        ->where('assessment.status','=','published')
        ->count();



        $detail=DB::table('subject_class')
        ->where('subject_class.class_id','=',$classid)
        ->where('subject_class.subject_id','=',$subjectid)
        ->join('subject','subject.id','=','subject_class.subject_id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject_name as subject','class_name as class','class.id as classid','subject.id as subjectid')
        ->get();
        return view('teacher.mystudents',compact(['classid','subjectid','detail','mark','sub','std']));
    }
}
