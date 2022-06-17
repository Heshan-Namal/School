<?php

namespace App\Http\Controllers;
use App\Models\Assessment;
use App\Models\Student_assesment;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Submit_assesmentController extends Controller
{
    public function index(Request $request,$classid,$subjectid)
    {
        $term=$request->term;
        $week=$request->week;
        $day=$request->day;
        if(($term==NULL)||($term=='allt')){
            $assignments=DB::table('student_assessment')
            ->join('assessment','student_assessment.assessment_id','=','assessment.id')
            ->join('student','student.admission_no','=','student_assessment.admission_no')
            ->select('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.term','assessment.extra_week','assessment.day',DB::raw('count(*) as count'))
            ->where('assessment.class_id',$classid)
            ->where('assessment.subject_id',$subjectid)
            ->groupBy('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.extra_week','assessment.term','assessment.day')
            ->get();
        }
        elseif($week=='allw'){
            $assignments=DB::table('student_assessment')
            ->join('assessment','student_assessment.assessment_id','=','assessment.id')
            ->join('student','student.admission_no','=','student_assessment.admission_no')
            ->select('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.term','assessment.extra_week','assessment.day',DB::raw('count(*) as count'))
            ->where('assessment.class_id',$classid)
            ->where('assessment.subject_id',$subjectid)
            ->where('assessment.term','=',$term)
            ->groupBy('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.extra_week','assessment.term','assessment.day')
            ->get();
        }elseif($day==NULL){
            if($week == 'extra'){
                $assignments=DB::table('student_assessment')
                    ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                    ->join('student','student.admission_no','=','student_assessment.admission_no')
                    ->select('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.extra_week','assessment.term','assessment.day',DB::raw('count(*) as count'))
                    ->where('assessment.class_id',$classid)
                    ->where('assessment.subject_id',$subjectid)
                    ->where('assessment.term','=',$term)
                    ->whereNotNull('assessment.extraweek')
                    ->groupBy('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.extra_week','assessment.term','assessment.day')
                    ->get();
            }else{
                $assignments=DB::table('student_assessment')
                    ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                    ->join('student','student.admission_no','=','student_assessment.admission_no')
                    ->select('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.term','assessment.day',DB::raw('count(*) as count'))
                    ->where('assessment.class_id',$classid)
                    ->where('assessment.subject_id',$subjectid)
                    ->where('assessment.term','=',$term)
                    ->where('assessment.week','=',$week)
                    ->groupBy('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.term','assessment.day')
                    ->get();

            }

        }else{
            if($week == 'extra'){
                $assignments=DB::table('student_assessment')
                ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                ->join('student','student.admission_no','=','student_assessment.admission_no')
                ->select('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.extra_week','assessment.term','assessment.day',DB::raw('count(*) as count'))
                ->where('assessment.class_id',$classid)
                ->where('assessment.subject_id',$subjectid)
                ->where('assessment.term','=',$term)
                ->whereNotNull('assessment.extra_week')
                ->where('assessment.day','=',$day)
                ->groupBy('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.extra_week','assessment.term','assessment.day')
                ->get();

            }else{
                $assignments=DB::table('student_assessment')
                ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                ->join('student','student.admission_no','=','student_assessment.admission_no')
                ->select('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.term','assessment.day',DB::raw('count(*) as count'))
                ->where('assessment.class_id',$classid)
                ->where('assessment.subject_id',$subjectid)
                ->where('assessment.term','=',$term)
                ->where('assessment.week','=',$week)
                ->where('assessment.day','=',$day)
                ->groupBy('assessment.id','assessment.title','assessment.assessment_type','assessment.week','assessment.term','assessment.day')
                ->get();
            }
        }
        // ->whereDate('due_date', '>', Carbon::now())
        // ->orderBy('due_date','asc')

        $nearas=DB::table('student_assessment')
            ->join('assessment','student_assessment.assessment_id','=','assessment.id')
            ->join('student','student.admission_no','=','student_assessment.admission_no')
            ->select('assessment.title','assessment.due_date',DB::raw('count(*) as count'))
            ->where('assessment.class_id',$classid)
            ->where('assessment.subject_id',$subjectid)
            ->groupBy('assessment.title','assessment.due_date')
            ->orderBy('due_date','asc')
            ->get();


        return view('teacher.Assesments.Submit_assesment',compact(['assignments','classid','subjectid','nearas']));





    }
    public function subassview($id)
    {
        $sub=DB::table('student_assessment')
                ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                ->join('student','student.admission_no','=','student_assessment.admission_no')
                ->select('student_assessment.id as id','Student.full_name as name','assessment.assessment_type as type','student_assessment.answer_file as file','student_assessment.uploaded_date as date','student_assessment.assessment_marks as marks')
                ->where('student_assessment.assessment_id',$id)
                ->get();


        return view('teacher.Assesments.submited_students',compact('sub'));
    }

    public function updatemarks(Request $req,$id)
    {

        $ass=Assignment_student::find($id);

        $ass->ass_marks=$req->marks;
        $assid=$ass->assignment_id;
        //dd($ass);
        $ass->save();

        return redirect()->route('submit.view',compact('assid'))->with('message','Assesment Questions Updated successfully');
    }

}
