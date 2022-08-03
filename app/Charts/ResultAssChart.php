<?php

declare(strict_types = 1);

namespace App\Charts;
use Illuminate\Support\Facades\DB;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class ResultAssChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */


    public function handler(Request $request): Chartisan
    {

        $labels = [];
        $count = [];
        $assments=DB::table('assessment')
                ->where('assessment.class_id','=',$request->classid)
                ->where('assessment.subject_id','=',$request->subjectid)
                ->get();
                foreach ($assments as $as){
                    $sub=DB::table('student_assessment')
                    ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                    ->join('student','student.admission_no','=','student_assessment.admission_no')
                    ->where('student_assessment.assessment_id',$as->id)
                    ->where('student_assessment.assessment_marks','>','50')
                    ->count();
                    array_push($labels,$as->title);
                    array_push($count,$sub);
                }


        return Chartisan::build()
        ->labels($labels)
        ->dataset('Student scores more than 50 for Assesment', $count);
    }
}
