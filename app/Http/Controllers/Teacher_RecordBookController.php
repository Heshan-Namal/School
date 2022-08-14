<?php

namespace App\Http\Controllers;

use App\Models\ClassTimetable;
use App\Models\ClassRecordBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\RecordBookExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;
class Teacher_RecordBookController extends Controller
{
    public function index(Request $request,$classid,$subjectid)
    {
        // $now = Carbon::now();
        // $c_week=$now->weekOfYear;
        // if ((1<$c_week) && (16>$c_week)) {
        //     $term='term1';
        //     $week=$c_week;
        // }elseif ((17<$c_week) && (32>$c_week)) {
        //     $term='term2';
        //     $week=$c_week-16;
        // }else {
        //     $term='term3';
        //     $week=$c_week-32;
        // }
        $date=Carbon::now()->format('y/m/d/l/W');
        $datearr=explode("/",$date);
        $week=$datearr[4]%17;
        //dd($week);
        if ($datearr[1]>=1 && $datearr[1]<5) {
            $term='term1';
        }elseif ($datearr[1]>=5 && $datearr[1]<9) {
            $term='term2';
        }else {
            $term='term3';
        }
        $day=Carbon::now()->format('l');
        $record=DB::table('class_timetable')
            ->where('class_timetable.class_id',$classid)
            ->where('class_timetable.subject_id',$subjectid)
            ->where('class_timetable.day',$day)
            ->select('class_timetable.period')
            ->orderBy('class_timetable.period','asc')
            ->get();
            //dd($record);
            foreach ($record as $key => $r) {
                $rec=DB::table('class_record')
                ->where('class_record.period','=',$r->period)
                ->where('class_record.day','=',Carbon::today()->toDateString())
                ->select('class_record.record','class_record.period')
                ->first();
                //dd($rec);
                if(($rec!=null)){
                    $book[$rec->period]=$rec->record;
                }
            }
            if(!isset($book)){
                $book=null;
            }
            $term1=DB::table('class_record')
            ->where('class_record.class_id',$classid)
            ->where('class_record.subject_id',$subjectid)
            ->where('class_record.term','=','term1')
            ->paginate(10);
            $term2=DB::table('class_record')
            ->where('class_record.class_id',$classid)
            ->where('class_record.subject_id',$subjectid)
            ->where('class_record.term','=','term2')
            ->paginate(10);
            $term3=DB::table('class_record')
            ->where('class_record.class_id',$classid)
            ->where('class_record.subject_id',$subjectid)
            ->where('class_record.term','=','term3')
            ->paginate(10);

        return view('teacher.Record_Book.index',compact(['week','record','day','classid','subjectid','term','book','term1','term2','term3']));
    }
    public function store(Request $req,$classid,$subjectid)
    {


        ClassRecordBook::create(
            [
                'day'=>Carbon::now(),
                'period'=>$req->period,
                'term'=>$req->term,
                'record'=>$req->record,
                'teacher_attendance'=>'yes',
                'class_id'=>$classid,
                'subject_id'=>$subjectid,
                'teacher_id'=>Auth::user()->id
            ]

            );
            return redirect()->route('class.recordbook',[$classid,$subjectid])->with('message','Record added successfully');



    }

    public function update(Request $req,$classid,$subjectid)
    {
        $record=DB::table('class_record')
                ->where('class_record.period','=',$req->period)
                ->where('class_record.class_id','=',$classid)
                ->where('class_record.subject_id','=',$subjectid)
                ->where('class_record.day','=',Carbon::today()->toDateString())
                ->select('class_record.id')
                ->first();

                $rec=ClassRecordBook::find($record->id);
                $rec->record=$req->record;
                $rec->save();

        return redirect()->route('class.recordbook',[$classid,$subjectid])->with('message','Record updated successfully');



    }

    public function export($classid,$subjectid,$term)
    {
        $data=DB::table('class_record')
            ->where('class_record.class_id',$classid)
            ->where('class_record.subject_id', $subjectid)
            ->where('class_record.term','=',$term)
            ->get();
        return Excel::download(new RecordBookExport($data,$term), 'recordbook.xlsx');
    }

    public function exportpdf($classid,$subjectid,$term)
    {
        $data=DB::table('class_record')
            ->where('class_record.class_id',$classid)
            ->where('class_record.subject_id', $subjectid)
            ->where('class_record.term','=',$term)
            ->get();

            //  dd($data);
        $pdf=PDF::loadView('exports.recordbook',compact(['data','term']));
               return $pdf->download('recordbook.pdf');
    }
}
