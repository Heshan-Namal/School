<?php

declare(strict_types = 1);

namespace App\Charts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class ClasspresChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $labels = [];
        $ass_submit = [];
        $data=DB::table('teacher_subject')
        ->where('teacher_subject.teacher_id','=',Auth::user()->id)
        ->join('subject','subject.id','=','teacher_subject.subject_id')
        ->join('subject_class','subject_class.subject_id','=','subject.id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('class.class_name as class','class.id as classid','subject.id as subjectid')
        ->orderBy('class.class_name','asc')
        ->get();

        foreach ($data as $key=>$d){

            $val=0;
            array_push($labels,$d->class);
            $ano=DB::table('assessment')
            ->where('assessment.class_id','=',$d->classid)
            ->where('assessment.subject_id','=',$d->subjectid)
            ->count();
            $std=DB::table('student')
            ->where('student.class_id',$d->classid)
            ->count();
            $ass=DB::table('assessment')
                ->where('assessment.class_id','=',$d->classid)
                ->where('assessment.subject_id','=',$d->subjectid)
                ->get();
            $t1=0;
            $total=$std*$ano;
            foreach ($ass as $key => $a) {
                $sub=DB::table('student_assessment')
                    ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                    ->join('student','student.admission_no','=','student_assessment.admission_no')
                    ->where('student_assessment.assessment_id',$a->id)
                    ->count();
                $t1=$t1+$sub;
            }
            if ($total != 0) {
                $val=($t1/$total)*100;
                array_push($ass_submit,round($val,2));
            }else{
                array_push($ass_submit,round($val,2));
            }

        }

        return Chartisan::build()
        ->labels($labels)
        ->dataset('Precentage of Submitted Assesments', $ass_submit);
    }
}
