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
        $search=$request->search;
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
            ->where(function($query) use ($search){
                $query->where('assessment.title', 'LIKE', '%'.$search.'%')
                        ->orWhere('assessment.assessment_type', 'LIKE', '%'.$search.'%')
                        ->orWhere('assessment.day', 'LIKE', '%'.$search.'%');
            })
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
            ->orderBy('due_date','desc')
            ->limit(5)
            ->get();


        return view('teacher.Assesments.Submit_assesment',compact(['assignments','classid','subjectid','nearas']));





    }
    public function subassview(Request $request,$id)
    {
        $search=$request->search;
        $sub=DB::table('student_assessment')
                ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                ->join('student','student.admission_no','=','student_assessment.admission_no')
                ->select('student_assessment.id as id','student.full_name as name','assessment.due_date','assessment.assessment_type as type','student_assessment.answer_file as file','student_assessment.uploaded_date as date','student_assessment.assessment_marks as marks')
                ->where('student_assessment.assessment_id',$id)
                ->where(function($query) use ($search){
                    $query->where('student.full_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('student_assessment.uploaded_date', 'LIKE', '%'.$search.'%')
                            ->orWhere('student_assessment.assessment_marks', 'LIKE', '%'.$search.'%')
                            ->orWhere('student_assessment.answer_file', 'LIKE', '%'.$search.'%');
                })
                ->get();

                $nums=DB::table('student_assessment')
                ->where('student_assessment.assessment_id',$id)
                ->orderBy('student_assessment.admission_no')
                ->count();

                $late=DB::table('student_assessment')
                ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                ->where('student_assessment.assessment_id',$id)
                ->select('student_assessment.uploaded_date','assessment.due_date')
                ->where('assessment.due_date','<','student_assessment.uploaded_date',)
                ->count();

                //dd($late);
                $mar=DB::table('student_assessment')
                ->where('student_assessment.assessment_id',$id)
                ->where('student_assessment.assessment_marks','=',0)
                ->count();

                $classid=DB::table('student_assessment')
                ->join('student','student.admission_no','=','student_assessment.admission_no')
                ->where('student_assessment.assessment_id',$id)
                ->select('student.class_id')
                ->first();

                $std=DB::table('student')
                ->where('student.class_id',$classid->class_id)
                ->select('student.admission_no')
                ->count();

                $hm=DB::table('student_assessment')
                ->join('assessment','student_assessment.assessment_id','=','assessment.id')
                ->join('student','student.admission_no','=','student_assessment.admission_no')
                ->select('student_assessment.id as id','student.full_name','student.admission_no','student_assessment.assessment_marks')
                ->where('student_assessment.assessment_id',$id)
                ->orderBy('student_assessment.assessment_marks','desc')
                ->limit(10)
                ->get();

                $notsub=((int)$std-(int)$nums);
              //  dd($notsub);


        return view('teacher.Assesments.submited_students',compact('sub','nums','late','mar','hm','notsub'));
    }

    public function updatemarks(Request $req,$id)
    {

        $ass=Student_assesment::find($id);

        $ass->assessment_marks=$req->marks;
        $assid=$ass->assessment_id;
        //dd($assid);
        $ass->save();
        return redirect()->route('submit.view',compact('assid'))->with('message','Assesment Marks Updated successfully');
    }

}
