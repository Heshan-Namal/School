<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Termtest;
use PDF;
class TermController extends Controller
{
    public function termtest()
    {
        $dd=DB::table('class')
        ->where('class.teacher_id',Auth::user()->id)
        ->select('class.class_name','class.id')
        ->first();
        //dd($dd);
        return view('class_teacher.addtermtest',compact('dd'));
    }
    public function addtermtest(Request $req,$classid)
    {
        $dd=DB::table('class')
        ->where('class.teacher_id',Auth::user()->id)
        ->select('class.class_name','class.id')
        ->first();

        $term=$req->term;
        $std=DB::table('student')
                ->join('user','user.id','=','student.user_id')
                ->where('student.class_id',$classid)
                ->paginate(15);
            //dd($std);
        return view('class_teacher.termtest_students',compact(['std','term','dd']));
    }
    public function addstd_result($term,$studentid)
    {
        //$avg=0.0;
        $dd=DB::table('class')
        ->where('class.teacher_id',Auth::user()->id)
        ->select('class.class_name','class.id')
        ->first();

        $data = DB::table('student')
                ->where('student.admission_no', '=',$studentid )
                ->join('class', 'class.id', '=', 'student.class_id')
                ->join('subject_class', 'subject_class.class_id', '=', 'class.id')
                ->join('subject', 'subject.id', '=', 'subject_class.subject_id')
                ->select('subject.id as subjectid','subject.subject_name','class.id as classid')
                ->get();
        //dd($data);
        //join ghuwe natte patan gaddima exam table ekma null thiyeddii sampurna collection eka null wena
        //nisa wenama subject tika witharak ganna ba ethkota
            foreach ($data as $key =>$e) {
                $exam = DB::table('exam_result')
                ->where('exam_result.admission_no', '=',$studentid )
                ->where('exam_result.subject_id', '=',$e->subjectid )
                ->where('exam_result.class_id', '=',$e->classid )
                ->where('exam_result.term', '=',$term )
                ->select('exam_result.marks')
                ->first();
                if (!isset($exam)) {
                    $sub[$e->subjectid]='no';

                }
                else{
                    $sub[$e->subjectid]=$exam->marks;

                }
            }
            //dd($sub);
        $year = Carbon::now()->format('Y');

        $std=DB::table('student')
                ->where('student.admission_no',$studentid)
                ->first();


            //dd($std);
        return view('class_teacher.student_result',compact(['std','term','dd','data','year','sub']));


    }

    public function store(Request $req,$term,$subjectid,$classid)
    {
        //dd($req);
        Termtest::create(
            [
                'term'=>$term,
                'marks'=>$req->marks,
                'year'=>Carbon::now()->format('Y'),
                'subject_id'=>$subjectid,
                'class_id'=>$classid,
                'teacher_id'=>Auth::user()->id,
                'admission_no'=>$req->studentid,
            ]
            );

        return redirect()->back();
    }

    public function testupdate($term,$subjectid,$classid)
    {
        $exam = DB::table('exam_result')
        ->where('exam_result.admission_no', '=',$req->studentid )
        ->where('exam_result.subject_id', '=',$subjectid )
        ->where('exam_result.class_id', '=',$classid )
        ->where('exam_result.term', '=',$term )
        ->update(['exam_result.marks' => $req->marks]);

        return redirect()->back();
    }


    public function view_test($term,$studentid,$classid)
    {
        $pos=0;
        $avg=0.0;
        $lables = DB::table('exam_result')
                ->where('exam_result.admission_no', '=',$studentid )
                ->where('exam_result.class_id', '=',$classid )
                ->where('exam_result.term', '=',$term )
                ->join('student','exam_result.admission_no','=','student.admission_no')
                ->join('class', 'class.id', '=', 'exam_result.class_id')
                ->first();
   //dd($lables);

        $data = DB::table('exam_result')
                ->where('exam_result.admission_no', '=',$studentid )
                ->where('exam_result.class_id', '=',$classid )
                ->where('exam_result.term', '=',$term )
                ->join('student','exam_result.admission_no','=','student.admission_no')
                ->join('class', 'class.id', '=', 'exam_result.class_id')
                ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
                ->select('subject.subject_name','exam_result.marks')
                ->get();
    //dd($data);

        $sum = DB::table('exam_result')
        ->where('exam_result.admission_no', '=',$studentid )
        ->where('exam_result.class_id', '=',$classid )
        ->where('exam_result.term', '=',$term )
        ->join('student','exam_result.admission_no','=','student.admission_no')
        ->join('class', 'class.id', '=', 'exam_result.class_id')
        ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
        ->select(DB::raw('sum(exam_result.marks) as sum'))
        ->groupBy('exam_result.admission_no')
        ->first();


        $order = DB::table('exam_result')
        ->where('exam_result.class_id', '=',$classid )
        ->where('exam_result.term', '=',$term )
        ->join('student','exam_result.admission_no','=','student.admission_no')
        ->join('class', 'class.id', '=', 'exam_result.class_id')
        ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
        ->select(DB::raw('sum(exam_result.marks) as sum'),'exam_result.admission_no','student.full_name')
        ->groupBy('exam_result.admission_no','student.full_name')
        ->orderBy('sum','desc')
        ->get();


        foreach ($order as $key => $o) {
            if($o->sum == $sum->sum){
                $pos=$key+1;
            }
        }

        $count = DB::table('student')
            ->where('student.admission_no', '=',$studentid )
            ->join('class', 'class.id', '=', 'student.class_id')
            ->join('subject_class', 'subject_class.class_id', '=', 'class.id')
            ->join('subject', 'subject.id', '=', 'subject_class.subject_id')
            ->count();
            if (isset($sum)) {
                if ($count==0) {
                    $avg=0.0;
                }else{
                    $avg=round($sum->sum/$count,2);

                }
            }

        //dd($avg);

        // $pdf=PDF::loadView('exports.resultExport',compact(['lables','avg','data','count','pos']));
        //        return $pdf->download('result.pdf');
        //return view('exports.resultExport',compact(['lables','avg','data','count','pos']));
        return view('class_teacher.term_student_result',compact(['lables','avg','data','count','pos']));
    }






    public function exportpdf($term,$studentid,$classid)
    {
        $pos=0;
        $avg=0.0;
        $lables = DB::table('exam_result')
                ->where('exam_result.admission_no', '=',$studentid )
                ->where('exam_result.class_id', '=',$classid )
                ->where('exam_result.term', '=',$term )
                ->join('student','exam_result.admission_no','=','student.admission_no')
                ->join('class', 'class.id', '=', 'exam_result.class_id')
                ->first();
   //dd($lables);

        $data = DB::table('exam_result')
                ->where('exam_result.admission_no', '=',$studentid )
                ->where('exam_result.class_id', '=',$classid )
                ->where('exam_result.term', '=',$term )
                ->join('student','exam_result.admission_no','=','student.admission_no')
                ->join('class', 'class.id', '=', 'exam_result.class_id')
                ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
                ->select('subject.subject_name','exam_result.marks')
                ->get();
    //dd($data);

        $sum = DB::table('exam_result')
        ->where('exam_result.admission_no', '=',$studentid )
        ->where('exam_result.class_id', '=',$classid )
        ->where('exam_result.term', '=',$term )
        ->join('student','exam_result.admission_no','=','student.admission_no')
        ->join('class', 'class.id', '=', 'exam_result.class_id')
        ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
        ->select(DB::raw('sum(exam_result.marks) as sum'))
        ->groupBy('exam_result.admission_no')
        ->first();


        $order = DB::table('exam_result')
        ->where('exam_result.class_id', '=',$classid )
        ->where('exam_result.term', '=',$term )
        ->join('student','exam_result.admission_no','=','student.admission_no')
        ->join('class', 'class.id', '=', 'exam_result.class_id')
        ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
        ->select(DB::raw('sum(exam_result.marks) as sum'),'exam_result.admission_no','student.full_name')
        ->groupBy('exam_result.admission_no','student.full_name')
        ->orderBy('sum','desc')
        ->get();


        foreach ($order as $key => $o) {
            if($o->sum == $sum->sum){
                $pos=$key+1;
            }
        }

        $count = DB::table('student')
            ->where('student.admission_no', '=',$studentid )
            ->join('class', 'class.id', '=', 'student.class_id')
            ->join('subject_class', 'subject_class.class_id', '=', 'class.id')
            ->join('subject', 'subject.id', '=', 'subject_class.subject_id')
            ->count();
            if (isset($sum)) {
                if ($count==0) {
                    $avg=0.0;
                }else{
                    $avg=round($sum->sum/$count,2);

                }
            }

        //dd($avg);

        $pdf=PDF::loadView('exports.resultExport',compact(['lables','avg','data','count','pos']));
               return $pdf->download('result.pdf');

    }

    public function view(Request $req,$classid)
    {

        $term=$req->term;

        $order = DB::table('exam_result')
        ->where('exam_result.class_id', '=',$classid )
        ->where('exam_result.term', '=',$term )
        ->join('student','exam_result.admission_no','=','student.admission_no')
        ->join('class', 'class.id', '=', 'exam_result.class_id')
        ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
        ->select(DB::raw('sum(exam_result.marks) as sum'),'exam_result.admission_no','student.full_name')
        ->groupBy('exam_result.admission_no','student.full_name')
        ->orderBy('sum','desc')
        ->get();

        //dd($order);
        $count = DB::table('subject_class')
            ->join('class', 'class.id' , '=', 'subject_class.class_id')
            ->join('subject', 'subject.id', '=', 'subject_class.subject_id')
            ->where('subject_class.class_id','=',$classid)
            ->count();

        $dd=DB::table('class')
        ->where('class.id',$classid)
        ->select('class.class_name','class.id')
        ->first();
//dd($count);
        return view('class_teacher.termtest_view',compact(['order','count','classid','dd','term']));
    }
    public function termtestview()
    {
        $dd=DB::table('class')
        ->where('class.teacher_id',Auth::user()->id)
        ->select('class.class_name','class.id')
        ->first();
        //dd($dd);
        return view('class_teacher.viewterm-result',compact('dd'));
    }
}
