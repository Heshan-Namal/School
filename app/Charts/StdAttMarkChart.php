<?php

declare(strict_types = 1);

namespace App\Charts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class StdAttMarkChart extends BaseChart
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
        // $std=DB::table('student')
        //     ->where('student.class_id',$request->classid)
        //     ->count();
        $period = CarbonPeriod::create(Carbon::now()->firstOfMonth()->startOfDay(), Carbon::now()->lastOfMonth()->endOfDay()->format('Y-m-d'));
        $c=0;

        foreach($period as $date)
        {
            $tval=0;
            array_push($labels,$date->format('Y-m-d'));
            $quizes=DB::table('attentiveness_check')
            ->where('attentiveness_check.class_id','=',$request->classid)
            ->where('attentiveness_check.subject_id','=',$request->subjectid)
            ->where('attentiveness_check.date','=',$date)
            ->get();
            $qno=DB::table('attentiveness_check')
            ->where('attentiveness_check.class_id','=',$request->classid)
            ->where('attentiveness_check.subject_id','=',$request->subjectid)
            ->where('attentiveness_check.date','=',$date)
            ->count();
            //$v=$std*$qno;
            $t1=0;
            foreach ($quizes as $key => $q) {
                $mark=DB::table('student_attentiveness_check')
                ->where('student_attentiveness_check.A_check_id',$q->id)
                ->where('student_attentiveness_check.admission_no','s1')
                ->select('student_attentiveness_check.total_points as mark')
                ->first();
                if ($mark!=null) {
                    $t1=$t1+$mark->mark;
                }else{
                    $t1=$t1+0;
                }

            }
            if ($qno != 0) {
                $tval=($t1/$qno);
                array_push($count,round($tval,2));
            }else {
                array_push($count,round($tval,2));
            }
        }

        return Chartisan::build()
        ->labels($labels)
        ->dataset('Average', $count);
    }
}
