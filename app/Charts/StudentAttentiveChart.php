<?php

declare(strict_types = 1);

namespace App\Charts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class StudentAttentiveChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $labels = [];
        $count=[];

        $data = DB::table('student')
        ->where('student.admission_no', '=',$request->id )
        ->join('class', 'Class.id', '=', 'student.class_id')
        ->join('subject_class', 'subject_class.class_id', '=', 'class.id')
        ->join('subject', 'subject.id', '=', 'subject_class.subject_id')
        ->select('subject.id as subjectid','subject.subject_name','class.id as classid')
        ->get();

        foreach ($data as $key => $d) {

            $tval=0;
            array_push($labels,$d->subject_name);
            $q=DB::table('student_attentiveness_check')
            ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
            ->where('attentiveness_check.class_id','=',$d->classid)
            ->where('attentiveness_check.subject_id','=',$d->subjectid)
            ->where('attentiveness_check.status','=','published')
            ->where('student_attentiveness_check.admission_no','=',$request->id)
            ->count();

            $v=DB::table('student_attentiveness_check')
            ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
            ->where('attentiveness_check.class_id','=',$d->classid)
            ->where('attentiveness_check.subject_id','=',$d->subjectid)
            ->where('attentiveness_check.status','=','published')
            ->count();

            if ($v != 0) {
                $tval=($q/$v)*100;
                array_push($count,round($tval,2));
            }else {
                array_push($count,round($tval,2));
            }
            }

            return Chartisan::build()
            ->labels($labels)
            ->dataset('Precentage', $count);

    }
}
