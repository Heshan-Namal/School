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
        $term1 = [];
        $term2 = [];
        $term3 = [];
        $data=DB::table('teacher_subject')
        ->where('teacher_subject.teacher_id','=',Auth::user()->id)
        ->join('subject','subject.id','=','teacher_subject.subject_id')
        ->join('subject_class','subject_class.subject_id','=','subject.id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('class.class_name as class','class.id as classid','subject.id as subjectid')
        ->orderBy('class.class_name','asc')
        ->get();

        foreach ($data as $d){
            array_push($labels,$d->class);
            $at1no=DB::table('assessment')
            ->where('assessment.class_id','=',$d->classid)
            ->where('assessment.subject_id','=',$d->subjectid)
            ->where('assessment.term','=','term1')
            ->count();
            $std=DB::table('student')
            ->where('student.class_id',$d->classid)
            ->count();
            $at2no=DB::table('assessment')
            ->where('assessment.class_id','=',$d->classid)
            ->where('assessment.subject_id','=',$d->subjectid)
            ->where('assessment.term','=','term2')
            ->count();
            $at3no=DB::table('assessment')
            ->where('assessment.class_id','=',$d->classid)
            ->where('assessment.subject_id','=',$d->subjectid)
            ->where('assessment.term','=','term3')
            ->count();
            $asst1=DB::table('assessment')
                ->where('assessment.class_id','=',$d->classid)
                ->where('assessment.subject_id','=',$d->subjectid)
                ->where('assessment.term','=','term1')
                ->get();
            $asst2=DB::table('assessment')
            ->where('assessment.class_id','=',$d->classid)
            ->where('assessment.subject_id','=',$d->subjectid)
            ->where('assessment.term','=','term2')
            ->get();
            $asst3=DB::table('assessment')
            ->where('assessment.class_id','=',$d->classid)
            ->where('assessment.subject_id','=',$d->subjectid)
            ->where('assessment.term','=','term3')
            ->get();
            $t1=0;
            $t2=0;
            $t3=0;
            $t1v=$std*$at1no;
            $t2v=$std*$at2no;
            $t3v=$std*$at3no;
            foreach ($asst1 as $key => $at1) {
                $sub=DB::table('student_assessment')
                    ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                    ->join('student','student.admission_no','=','student_assessment.admission_no')
                    ->where('student_assessment.assessment_id',$at1->id)
                    ->count();
                $t1=$t1+$sub;
            }
            foreach ($asst2 as $key => $at2) {
                $sub=DB::table('student_assessment')
                    ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                    ->join('student','student.admission_no','=','student_assessment.admission_no')
                    ->where('student_assessment.assessment_id',$at2->id)
                    ->count();
                $t2=$t2+$sub;
            }
            foreach ($asst3 as $key => $at3) {
                $sub=DB::table('student_assessment')
                    ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                    ->join('student','student.admission_no','=','student_assessment.admission_no')
                    ->where('student_assessment.assessment_id',$at3->id)
                    ->count();
                $t3=$t3+$sub;
            }
            if ($t1v != 0 && $t2v != 0 && $t3v != 0) {
                $term1_val=($t1/$t1v)*100;
                $term2_val=($t2/$t2v)*100;
                $term3_val=($t3/$t3v)*100;


                array_push($term1,$term1_val);
                array_push($term2,$term2_val);
                array_push($term3,$term3_val);
            }

        }

        return Chartisan::build()
        ->labels($labels)
        ->dataset('Term1', $term1)
        ->dataset('Term2', $term2)
        ->dataset('Term3', $term3);

    }
}
