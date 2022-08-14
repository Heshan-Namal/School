<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function attendance()
    {
        $dd=DB::table('class')
        ->where('class.teacher_id',Auth::user()->id)
        ->select('class.class_name','class.id')
        ->first();
        //dd($dd);
        return view('class_teacher.addattendance',compact('dd'));
    }

    public function addattendance(Request $req,$classid)
    {
        $dd=DB::table('class')
        ->where('class.teacher_id',Auth::user()->id)
        ->select('class.class_name','class.id')
        ->first();

        $term=$req->term;

        $data = DB::table('class')
        ->where('class.id', '=', $classid)
        ->join('subject_class', 'subject_class.class_id', '=', 'class.id')
        ->join('subject', 'subject.id', '=', 'subject_class.subject_id')
        ->select('subject.id as subjectid','subject.subject_name','class.id as classid')
        ->get();

        foreach ($data as $key =>$e) {
            $att = DB::table('attendance')
            ->where('attendance.subject_id', '=',$e->subjectid )
            ->where('attendance.class_id', '=',$e->classid )
            ->where('attendance.term', '=',$term )
            ->select('attendance.attendance_file')
            ->first();
            if (!isset($att)) {
                $sub[$e->subjectid]='no';

            }
            else{
                $sub[$e->subjectid]=$att->attendance_file;

            }
        }
        //dd($data);
        return view('class_teacher.attuploaded',compact(['dd','term','data','sub']));
    }
    public function store(Request $req)
    {
        $req->validate([
            'attendance_file'=>'mimes:xlsx,xls'
        ]);
        if(isset($req->attendance_file)){
            $path=$req->attendance_file;
            $name = $path->getClientOriginalName();
            $path->move('attendance',$name);
        }else{
            $name=NULL;
        }
    //dd($req);
        Attendance::create(
            [
                'term'=>$req->term,
                'attendance_file'=>$name,
                'subject_id'=>$req->subject_id,
                'class_id'=>$req->class_id,
                'teacher_id'=>Auth::user()->id,
            ]
            );
            //return redirect()->route('ass.index',[$classid,$subjectid])->with('message','Assignment added successfully');
        return redirect()->back()->with('message','Upload Successfull');
    }


    public function attendanceupdate(Request $req)
    {

        $req->validate([
            'attendance_file'=>'mimes:xlsx,xls'
        ]);
        $att1 = DB::table('attendance')
        ->where('attendance.subject_id', '=',$req->subjectid )
        ->where('attendance.class_id', '=',$req->classid )
        ->where('attendance.term', '=',$req->term )
        ->get('attendance.attendance_file');

        if($req->has('attendance_file')){
            $path=$req->attendance_file;
            $name = $path->getClientOriginalName();
            $path->move('attendance',$name);
        }else{
            $name=$att1->assessment_file;

        }

        $att = DB::table('attendance')
        ->where('attendance.subject_id', '=',$req->subjectid )
        ->where('attendance.class_id', '=',$req->classid )
        ->where('attendance.term', '=',$req->term )
        ->update(['attendance.attendance_file' => $name]);

        return redirect()->back()->with('message','Attendance Updated successfully');


    }
}
