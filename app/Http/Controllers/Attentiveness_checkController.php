<?php

namespace App\Http\Controllers;
use App\Models\Attentiveness_check;
use App\Models\Attentiveness_check_Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class Attentiveness_checkController extends Controller
{
    public function store(Request $req,$classid,$subjectid)
    {
        if(isset($req->extraweek)){
            $extra=$req->extraweek;
            $week=null;
        }else{
            $extra=null;
            $week=$req->week;
        }
        //return dd($req->assignments->getClientOriginalName());
        Attentiveness_check::create(
            [
                'title'=>$req->title,
                'quiz_duration'=>$req->duration,
                'term'=>$req->term,
                'week'=>$week,
                'extra_week'=>$extra,
                'date'=>$req->date,
                'period'=>$req->period,
                'class_id'=>$req->class_id,
                'subject_id'=>$req->subject_id,
                'teacher_id'=>Auth::user()->id
            ]
            );

        return redirect()->route('quiz.index',[$classid,$subjectid])->with('message','Quiz added successfully');

    }

    public function index(Request $request ,$classid,$subjectid)
    {
        $term=$request->term;
        $week=$request->week;
      //  $day=$request->day;
        if($term==NULL){
            $quizes=DB::table('attentiveness_check')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->get();
        }
        elseif($week==NULL){
            $quizes=DB::table('attentiveness_check')
            ->where('attentiveness_check.class_id','=',$classid)
            ->where('attentiveness_check.subject_id','=',$subjectid)
            ->where('attentiveness_check.term','=',$term)
            ->get();
        }else{
            if($week == 'extra'){
                $quizes=DB::table('attentiveness_check')
                ->where('attentiveness_check.class_id','=',$classid)
                ->where('attentiveness_check.subject_id','=',$subjectid)
                ->where('attentiveness_check.term','=',$term)
                ->whereNotNull('attentiveness_check.extraweek')
                ->get();
            }else{
                $quizes=DB::table('attentiveness_check')
                ->where('attentiveness_check.class_id','=',$classid)
                ->where('attentiveness_check.subject_id','=',$subjectid)
                ->where('attentiveness_check.term','=',$term)
                ->where('attentiveness_check.week','=',$week)
                ->get();
            }
        }
        $list=DB::table('attentiveness_check')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->whereDate('attentiveness_check.date', '=', Carbon::now())
        ->get();
        $stat=DB::table('attentiveness_check')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->where('attentiveness_check.status', '=', 'draft')
        ->count();
        $today=DB::table('attentiveness_check')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->whereDate('attentiveness_check.date', '=', Carbon::now())
        ->count();
        $uplod=DB::table('attentiveness_check')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->count();
       // dd($quizes);


       return view('teacher.Attentive_Quiz.index',compact(['quizes','classid','subjectid','list','stat','today','uplod']));



    }

    public function changeStatus(Request $request ,$id)
    {
        //dd(Carbon::now());
        $num=DB::table('attentiveness_check_question')
        ->where('attentiveness_check_question.a_check_id','=',$id)
        ->count();
        if($num>0){
            $input=attentiveness_check::find($id);
            $input->uploaded_time=Carbon::now()->format('h:i:s');
            $input->save();
            attentiveness_check::where('id',$id)->update(['status'=>$request->status]);
        }else{
            return back()->with('message','You didnt Add Questions for Attentive Quiz');
        }
        return back();
        //dd($request);
    }

    public function qstore(Request $req)
    {
        $id=$req->assid;
        Attentiveness_check_Question::create(
            [
                'question'=>$req->question,
                'option_1'=>$req->answer1,
                'option_2'=>$req->answer2,
                'option_3'=>$req->answer3,
                'option_4'=>$req->answer4,
                'correct_answer'=>$req->correct_answer,
                'a_check_id'=>$req->assid,
            ]
            );

        return redirect()->route('att.quizshow',compact('id'));

    }

    public function attentiveshow($id)
    {
        $n=Attentiveness_check_Question::where('a_check_id',$id)->get()->count();
        $questions=Attentiveness_check_Question::where('a_check_id',$id)->get();
        $question=Attentiveness_check::find($id);
        return view('teacher.Attentive_Quiz.Attentive_quetionView',compact(['question','n','questions']));
    }
}
