<?php

declare(strict_types = 1);

namespace App\Charts;

use Illuminate\Support\Facades\DB;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TermtestMarks extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $admission_no=getAdmissionNo();
        $labels = [];
        $count = [];
        $results = DB::table('exam_result')
                    ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
                    ->join('teacher', 'teacher.id', '=', 'exam_result.teacher_id')
                    ->where([['admission_no',$admission_no],['term','term1']])
                    ->select(['exam_result.*','subject.subject_name','teacher.full_name'])
                    ->get();

        foreach($results as $item){
            array_push($labels,$item->subject_name);
            array_push($count,$item->marks);
        }
        array_push($count,0);

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Term 1 results',$count);
    }
}