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
        $date=Carbon::createFromFormat('Y-m-d', $req->date)->format('y/m/d/l/W');
        $datearr=explode("/",$date);
        $week="week".$datearr[4]%17;
        //return dd($req->assignments->getClientOriginalName());
        Attentiveness_check::create(
            [
                'title'=>$req->title,
                'quiz_duration'=>$req->duration,
                'term'=>$req->term,
                'week'=>$week,
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
        $search=$request->search;
        $term=$request->term;
        // $week=$request->week;

      //  $day=$request->day;
        if(($term==NULL)||($term=='allt')){
            $quizes=DB::table('attentiveness_check')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->where(function($query) use ($search){
            $query->where('attentiveness_check.title', 'LIKE', '%'.$search.'%')
                    ->orWhere('attentiveness_check.date', 'LIKE', '%'.$search.'%')
                    ->orWhere('attentiveness_check.period', 'LIKE', '%'.$search.'%')
                    ->orWhere('attentiveness_check.week', 'LIKE', '%'.$search.'%');
            })

        ->paginate(10);
        }
        else{
            $quizes=DB::table('attentiveness_check')
            ->where('attentiveness_check.class_id','=',$classid)
            ->where('attentiveness_check.subject_id','=',$subjectid)
            ->where('attentiveness_check.term','=',$term)
            ->paginate(10);
        }
        $list=DB::table('attentiveness_check')
        ->where('attentiveness_check.class_id','=',$classid)
        ->where('attentiveness_check.subject_id','=',$subjectid)
        ->whereDate('attentiveness_check.date', '=', Carbon::now())
        ->get();
        //dd($list);
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
            return back()->with('error','You didnt Add Questions for Attentive Quiz');
        }
        return back()->with('message','Published Successfull');
        //dd($request);
        //return redirect()->route('submit.view',compact('assid'))->with('message','Assesment Marks Updated successfully');
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

        // $questions = Attentiveness_check_Question::with(['answers' => function($q) {
        //     $q->inRandomOrder();
        // }])->inRandomOrder()->get();

        $n=Attentiveness_check_Question::where('a_check_id',$id)->get()->count();
        $questions=Attentiveness_check_Question::where('a_check_id',$id)->get();
        $question=Attentiveness_check::find($id);
        return view('teacher.Attentive_Quiz.Attentive_quetionView',compact(['question','n','questions']));
    }


    public function attupdate(Request $req)
    {
        //dd($req->period);
        $date=Carbon::createFromFormat('Y-m-d', $req->date)->format('y/m/d/l/W');
        $datearr=explode("/",$date);
        $week="week".$datearr[4]%17;
        $att=Attentiveness_check::find($req->quizid);


        $att->title=$req->title;
        $att->term=$req->term;
        $att->week=$week;
        $att->date=$req->date;
        $att->extra_week=$req->extraweek;
        $att->period=$req->period;
        $att->quiz_duration=$req->duration;


        $att->save();
        //dd($classid);
        //return dd($req->assignments->getClientOriginalName());

        return redirect()->route('quiz.index',[$att->class_id,$att->subject_id])->with('message','Attentiveness Check Updated successfully');


    }

    public function destroy_att(Request $req){
        //dd($req->quizid);
        $att=Attentiveness_check::find($req->quizid);
        $att->delete();
        return back()->with('message','Succesfully Deleted the Record');
    }
    public function destroy_attq(Request $req){
        $attq=Attentiveness_check_Question::find($req->attqid);
        $attq->delete();
        return back()->with('message','Succesfully Deleted the Record');
    }

}
