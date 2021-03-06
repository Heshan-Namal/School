<?php

namespace App\Http\Controllers;
use App\Models\Assesment;
use App\Models\Assessment_quiz_question;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
class AssesmentController extends Controller
{
    public function index(Request $request ,$classid,$subjectid)
    {
        $search=$request->search;
        $term=$request->term;
        $week=$request->week;
        $day=$request->day;

        if(($term==NULL)||($term=='allt')){
            $assments=DB::table('assessment')
            ->where('assessment.class_id','=',$classid)
                ->where('assessment.subject_id','=',$subjectid)
                ->where(function($query) use ($search){
                $query->where('assessment.title', 'LIKE', '%'.$search.'%')
                        ->orWhere('assessment.assessment_type', 'LIKE', '%'.$search.'%')
                        ->orWhere('assessment.assessment_file', 'LIKE', '%'.$search.'%');
                })
                ->get();



        // ->paginate(3);

        }
        elseif($week=='allw'){
            $assments=DB::table('assessment')
            ->where('assessment.class_id','=',$classid)
            ->where('assessment.subject_id','=',$subjectid)
            ->where('assessment.term','=',$term)
            ->get();
        }elseif($day==NULL){
            if($week == 'extra'){
                $assments=DB::table('assessment')
                ->where('assessment.class_id','=',$classid)
                ->where('assessment.subject_id','=',$subjectid)
                ->where('assessment.term','=',$term)
                ->whereNotNull('assessment.extra_week')
                ->get();
            }else{
                $assments=DB::table('assessment')
                ->where('assessment.class_id','=',$classid)
                ->where('assessment.subject_id','=',$subjectid)
                ->where('assessment.term','=',$term)
                ->where('assessment.week','=',$week)
                ->get();
            }

        }else{
            if($week == 'extra'){
                $assments=DB::table('assessment')
                ->where('assessment.class_id','=',$classid)
                ->where('assessment.subject_id','=',$subjectid)
                ->where('assessment.term','=',$term)
                ->where('assessment.day','=',$day)
                ->whereNotNull('assessment.extra_week')
                ->get();
            }else{
                $assments=DB::table('assessment')
                ->where('assessment.class_id','=',$classid)
                ->where('assessment.subject_id','=',$subjectid)
                ->where('assessment.term','=',$term)
                ->where('assessment.week','=',$week)
                ->where('assessment.day','=',$day)
                ->get();
            }
        }
        $exnum = DB::table('assessment')
            ->where('assessment.class_id',$classid)
            ->where('assessment.subject_id',$subjectid)
           ->whereDate('due_date', '<', Carbon::now())
           ->count();
           $pubnum = DB::table('assessment')
           ->where('assessment.class_id',$classid)
           ->where('assessment.subject_id',$subjectid)
           ->where('status', '!=', 'published')
           ->count();
           $allnum = DB::table('assessment')
           ->where('assessment.class_id',$classid)
           ->where('assessment.subject_id',$subjectid)
           ->count();
           $nearex = DB::table('assessment')
           ->where('assessment.class_id',$classid)
           ->where('assessment.subject_id',$subjectid)
           ->whereDate('due_date', '>', Carbon::now())
           ->orderBy('due_date','asc')
           ->get();

        $detail=DB::table('subject_class')
        ->where('subject_class.class_id','=',$classid)
        ->where('subject_class.subject_id','=',$subjectid)
        ->join('subject','subject.id','=','subject_class.subject_id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject_name as subject','class_name as class','class.id as classid','subject.id as subjectid')
        ->get();

       return view('teacher.Assesments.index',compact(['assments','exnum','allnum','pubnum','classid','nearex','subjectid','detail']));



    }
    public function store(Request $req,$classid,$subjectid)
    {


        if(isset($req->assignments)){
            $path=$req->assignments;
            $name = $path->getClientOriginalName();
            $path->move('assignments',$name);
        }else{
            $name=NULL;
        }
        if(isset($req->extraweek)){
            $extra=$req->extraweek;
            $week=NULL;
        }else{
            $extra=NULL;
            $week=$req->week;
        }

        Assesment::create(
            [
                'title'=>$req->title,
                'description'=>$req->description,
                'assessment_file'=>$name,
                'term'=>$req->term,
                'week'=>$week,
                'extra_week'=>$extra,
                'day'=>$req->day,
                'due_date'=>$req->due_date,
                'assessment_type'=>$req->type,
                'allocated_marks'=>$req->a_marks,
                'class_id'=>$classid,
                'subject_id'=>$req->subjectid,
                'teacher_id'=>Auth::user()->id
            ]

            );
            return redirect()->route('ass.index',[$classid,$subjectid])->with('message','Assignment added successfully');



    }
    public function assquiz(Request $req)
    {
        $id=$req->assid;
        Assessment_quiz_question::create(
            [
                'question'=>$req->question,
                'option_1'=>$req->answer1,
                'option_2'=>$req->answer2,
                'option_3'=>$req->answer3,
                'option_4'=>$req->answer4,
                'correct_answer'=>$req->correct_answer,
                'assessment_id'=>$req->assid,
            ]
            );
        return redirect()->route('ass.quizshow',compact('id'));

    }
    public function assquizshow($id)
    {
        $n=Assessment_quiz_question::where('assessment_id',$id)->get()->count();
        $questions=Assessment_quiz_question::where('assessment_id',$id)->get();
        $assignment=Assesment::find($id);
        // $assments=Assignment::get();
        return view('teacher.Assesments.Assesment_quetionView',compact(['assignment','n','questions']));
    }

    public function assquestion_update(Request $req)
    {
        //  dd($req->id);

        $req->validate([

            'id'=>'required',
            'question'=>'required',
            'answer1'=>'required',
            'answer2'=>'required',
            'answer3'=>'required',
            'answer4'=>'required',
            'correct_answer'=>'required',


        ]);

        $question=Assessment_quiz_question::find($req->id);
        $id=$question->assessment_id;
        $question->question=$req->question;
        $question->option_1=$req->answer1;
        $question->option_2=$req->answer2;
        $question->option_3=$req->answer3;
        $question->option_4=$req->answer4;
        $question->correct_answer=$req->correct_answer;
        $question->save();
        //return dd($req->assignments->getClientOriginalName());

        return redirect()->route('ass.quizshow',compact('id'))->with('message','Assesment Questions Updated successfully');


    }
    public function assessmentupdate(Request $req)
    {
        //dd($req);
        $ass=Assesment::find($req->assid);
        if($req->has('assignments')){
            $path=$req->assignments;
            $name = $path->getClientOriginalName();
            $path->move('assignments',$name);
        }else{
            $name=$ass->assessment_file;

        }

        $ass->title=$req->title;
        $ass->description=$req->description;
        $ass->term=$req->term;
        $ass->week=$req->week;
        $ass->day=$req->day;
        $ass->extra_week=$req->extraweek;
        $ass->due_date=$req->due_date;
        $ass->allocated_marks=$req->a_marks;
        $ass->assessment_type=$req->type;
        $ass->assessment_file=$name;
        $classid=$ass->class_id;
        $subjectid=$ass->subject_id;

        $ass->save();
        //dd($classid);
        //return dd($req->assignments->getClientOriginalName());

        return redirect()->route('ass.index',[$classid,$subjectid])->with('message','Assignment Updated successfully');


    }

    public function changeStatus(Request $request ,$id)
    {
        $ass=Assesment::find($id);
        if($ass->assessment_type=='mcq_quiz'){
            $n=Assessment_quiz_question::where('assessment_id',$id)->get()->count();
            if($n>0){
                Assesment::where('id',$id)->update(['status'=>$request->status]);
            }else{
                return back()->with('message','You didnt Add Questions for Assessment');
            }
        }
        Assesment::where('id',$id)->update(['status'=>$request->status]);
        return back()->with('message','Published Successfull');
    }

    public function destroy_ass(Request $req){
        $ass=Assesment::find($req->assid);
        $ass->delete();
        return back()->with('message','Succesfully Deleted the Record');
    }
    public function destroy_assq(Request $req){
        $ass=Assessment_quiz_question::find($req->assqid);
        $ass->delete();
        return back()->with('message','Succesfully Deleted the Record');
    }


}
