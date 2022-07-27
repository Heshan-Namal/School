<?php

declare(strict_types = 1);

namespace App\Charts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TodayAttentiveChart extends BaseChart
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

                $quizes=DB::table('attentiveness_check')
                ->where('attentiveness_check.class_id','=',$request->classid)
                ->where('attentiveness_check.subject_id','=',$request->subjectid)
                ->whereDate('attentiveness_check.date', '=', Carbon::now())
                ->get();
                foreach ($quizes as $q){
                    $qu=DB::table('student_attentiveness_check')
                            ->join('attentiveness_check','student_attentiveness_check.A_check_id','=','attentiveness_check.id')
                            ->where('student_attentiveness_check.A_check_id',$q->id)
                            ->count();

                    array_push($labels,$q->title);
                    array_push($count,$qu);
                }



        return Chartisan::build()
        ->labels($labels)
        ->dataset('Submited Attentive Checks', $count);
    }
}
