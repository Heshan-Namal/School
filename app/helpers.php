<?php
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// student helper functions
function getAdmissionNo()
{
    $student_id = Auth::user()->id;
    return Student::where('user_id',$student_id)->pluck('admission_no')->first();
    
}
function getClassId()
{
    $student_id = Auth::user()->id;
    $class_id = Student::where('user_id',$student_id)->pluck('class_id')->first();
    return $class_id;
}

function getTermWeekDay()
{
    $date=Carbon::now()->setTimezone('Asia/colombo')->format('y/m/d/l/W');
    $datearr=explode("/",$date);
    $day=$datearr[3];
    $week=$datearr[4]%17;
     
    if($datearr[1]>=1 && $datearr[1]<5) $term=1;
    else if($datearr[1]>=5 && $datearr[1]<9) $term=2;
    else $term = 3;

    return [$term,$week,$day];
}

function getTodayClassLink($subject_id)
{
    $term ='term'.getTermWeekDay()[0];
    $week = 'week'.getTermWeekDay()[1];
    $day = strtolower(getTermWeekDay()[2]);

    $class_id = getClassId();
    
    $res = DB::table('resource')
            ->select('*')
            ->where([['class_id', $class_id],['subject_id', $subject_id],['term', $term],['week', $week],['day', $day]])
            ->get();

            $link = $res->where('resource_type','class_link')->pluck('resource_file')->first();    
    return $link;
}

function getTodayClassDetails($subject_id)
{
    $term ='term'.getTermWeekDay()[0];
    $week = 'week'.getTermWeekDay()[1];
    $day = strtolower(getTermWeekDay()[2]);

    $class_id = getClassId();
    
    $res = DB::table('resource')
            ->select('*')
            ->where([['class_id', $class_id],['subject_id', $subject_id],['term', $term],['week', $week],['day', $day]])
            ->get();
    $f_res = $res->whereNotIn('resource_type','class_link');
    return $f_res;
}