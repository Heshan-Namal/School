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

class AttentiveChart extends BaseChart
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
        $std=DB::table('student')
            ->where('student.class_id',$request->classid)
            ->count();
        $period = CarbonPeriod::create(Carbon::now()->firstOfMonth()->startOfDay(), Carbon::now()->lastOfMonth()->endOfDay());
        $c=0;

        foreach($period as $date)
        {
            $tval=0;
            array_push($labels,$date->format('d-m-Y'));

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
            $v=$std*$qno;
            $t1=0;
            foreach ($quizes as $key => $q) {
                $nums=DB::table('student_attentiveness_check')
                ->where('student_attentiveness_check.A_check_id',$q->id)
                ->count('student_attentiveness_check.admission_no');
                $t1=$t1+$nums;
            }
            if ($v != 0) {
                $tval=($t1/$v)*100;
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
