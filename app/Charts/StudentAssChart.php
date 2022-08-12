<?php

declare(strict_types = 1);

namespace App\Charts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class StudentAssChart extends BaseChart
{

    public function handler(Request $request): Chartisan
    {
                $labels = [];
                $count=[];

                $data = DB::table('student')
                ->where('student.admission_no', '=',$request->id )
                ->join('class', 'class.id', '=', 'student.class_id')
                ->join('subject_class', 'subject_class.class_id', '=', 'class.id')
                ->join('subject', 'subject.id', '=', 'subject_class.subject_id')
                ->select('subject.id as subjectid','subject.subject_name','class.id as classid')
                ->get();

                foreach ($data as $key => $d) {

                    $tval=0;
                    array_push($labels,$d->subject_name);
                    $ass=DB::table('student_assessment')
                        ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                        ->where('assessment.class_id','=',$d->classid)
                        ->where('assessment.subject_id','=',$d->subjectid)
                        ->where('assessment.status','=','published')
                        ->where('student_assessment.admission_no','=',$request->id)
                        ->select(DB::raw('sum(student_assessment.assessment_marks) as sum'),'student_assessment.admission_no')
                        ->groupBy('student_assessment.admission_no')
                        ->first();
                        $v=DB::table('assessment')
                        ->where('assessment.class_id','=',$d->classid)
                        ->where('assessment.subject_id','=',$d->subjectid)
                        ->where('assessment.status','=','published')
                        ->count();

                    if ($v != 0) {
                            $tval=($ass->sum/$v);
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
