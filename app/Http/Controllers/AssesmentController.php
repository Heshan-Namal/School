<?php

namespace App\Http\Controllers;
use App\Models\Assesment;
use App\Models\Notification;
use App\Models\Assessment_quiz_question;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AssesmentController extends Controller
{
    public function index(Request $request ,$classid,$subjectid)
    {
        //dd($request);
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
                        ->orWhere('assessment.assessment_file', 'LIKE', '%'.$search.'%')
                        ->orWhere('assessment.week', 'LIKE', '%'.$search.'%');
                })
                ->paginate(10);

        }elseif ($day==NULL) {
            $assments=DB::table('assessment')
                ->where('assessment.class_id','=',$classid)
                ->where('assessment.subject_id','=',$subjectid)
                ->where('assessment.term','=',$term)
                ->paginate(10);
        }else {
            $assments=DB::table('assessment')
                ->where('assessment.class_id','=',$classid)
                ->where('assessment.subject_id','=',$subjectid)
                ->where('assessment.term','=',$term)
                ->where('assessment.day','=',$day)
                ->paginate(10);
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
           ->paginate(4);

        $both_class=DB::table('subject_class')
        ->where('subject_class.class_id','=',$classid)
        ->where('subject_class.subject_id','=',$subjectid)
        ->join('subject','subject.id','=','subject_class.subject_id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject_name as subject','class_name as class','class.id as classid','subject.id as subjectid')
        ->first();

       return view('teacher.Assesments.index',compact(['assments','exnum','allnum','pubnum','classid','nearex','subjectid','both_class']));



    }
    public function store(Request $req,$classid,$subjectid)
    {
        $req->validate([
            'assignments'=>'mimes:pdf,doc',
        ]);
        if (isset($req->duration)) {
            $req->validate([
                'duration'=>'date_format:H:s:i'
            ]);
        }

        $date=Carbon::now()->format('y/m/d/l/W');
        $datearr=explode("/",$date);
        $day=$datearr[3];
        $week="week".$datearr[4]%17;

        if(isset($req->assignments)){
            $path=$req->assignments;
            $name = $path->getClientOriginalName();
            $path->move('assignments',$name);
        }else{
            $name=NULL;
        }
        // if(isset($req->extraweek)){
        //     $extra=$req->extraweek;
        //     $week=NULL;
        // }else{
        //     $extra=NULL;
        //     $week=$req->week;
        // }

        Assesment::create(
            [
                'title'=>$req->title,
                'description'=>$req->description,
                'assessment_file'=>$name,
                'quiz_duration'=>$req->duration,
                'term'=>$req->term,
                'week'=>$week,
                'day'=>$day,
                'due_date'=>$req->due_date,
                'assessment_type'=>$req->type,
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

        $req->validate([
            'assignments'=>'mimes:pdf,doc'
        ]);

        $date=Carbon::now()->format('y/m/d/l/W');
        $datearr=explode("/",$date);
        $day=$datearr[3];
        $week="week".$datearr[4]%17;

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
        $ass->week=$week;
        $ass->day=$day;
        $ass->due_date=$req->due_date;
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

        $date=Carbon::now()->format('y/m/d/l/W');
        $datearr=explode("/",$date);
        $ass=Assesment::find($id);
        if($ass->assessment_type=='mcq_quiz'){
            $n=Assessment_quiz_question::where('assessment_id',$id)->get()->count();
            if($n>0){
                $input=Assesment::find($id);
                $input->day=$datearr[3];
                $input->week="week".$datearr[4]%17;
                $input->save();
                Assesment::where('id',$id)->update(['status'=>$request->status]);
                return back()->with('message','Published Successfull');
            }else{

                return back()->with('error','You didnt Add Questions for Assessment');
            }

        }else {
                $input=Assesment::find($id);
                $input->day=$datearr[3];
                $input->week="week".$datearr[4]%17;
                $input->save();
                Assesment::where('id',$id)->update(['status'=>$request->status]);
                return back()->with('message','Published Successfull');
        }

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
    public function notify($classid,$subjectid,$id){
        $s_name=DB::table('subject')
        ->where('subject.id','=',$subjectid)
        ->first();
        $ass=Assesment::find($id);
        $notify = new Notification;
        $notify->subject=$s_name->subject_name;
        $notify->header=$ass->title;
        $notify->class_id=$classid;
        $notify->sender_id=Auth::user()->id;
        $notify->save();
        return back()->with('message','Succesfully send the Notification');
    }

}
