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


        // $detail=DB::table('Subject_class')
        // ->where('Subject_class.class_id','=',$classid)
        // ->where('Subject_class.subject_id','=',$subjectid)
        // ->join('Subject','Subject.id','=','Subject_class.subject_id')
        // ->join('Class','Class.id','=','Subject_class.class_id')
        // ->select('Subject.name as subject','Class.name as class','Class.id as classid','Subject.id as subjectid')
        // ->get();


        //dd($assments);
        //dd($detail);
        //dd($teacherid);
        //dd($assignments);

        return view('teacher.Assesments.Submit_assesment',compact(['assignments','classid','subjectid']));





    }
    public function subassview($id)
    {
        $sub=DB::table('Assignment_student')
                ->join('Assignment','Assignment_student.assignment_id','=','Assignment.id')
                ->join('Student','Student.id','=','Assignment_student.student_id')
                ->select('Assignment_student.id as id','Student.name as name','Assignment.type as type','Assignment_student.submission_name as file','Assignment_student.uploaded_date as date','Assignment_student.ass_marks as marks')
                ->where('Assignment_student.assignment_id',$id)
                ->get();

        //$n=Assignment_question::where('ass_id',$id)->get()->count();
       // $questions=Assignment_question::where('ass_id',$id)->get();
        //$assignment=Assignment::find($id);
        // $assments=Assignment::get();
        //dd($sub);
        return view('Ass.submitview',compact('sub'));
    }

    public function updatemarks(Request $req,$id)
    {

        $ass=Assignment_student::find($id);

        $ass->ass_marks=$req->marks;
        $assid=$ass->assignment_id;
        //dd($ass);
        $ass->save();
        //$n=Assignment_question::where('ass_id',$id)->get()->count();
       // $questions=Assignment_question::where('ass_id',$id)->get();
        //$assignment=Assignment::find($id);
        // $assments=Assignment::get();
        //dd($sub);
        //dd($ass);
        return redirect()->route('submit.view',compact('assid'))->with('message','Assesment Questions Updated successfully');
    }

}
