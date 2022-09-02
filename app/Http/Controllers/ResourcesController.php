<?php

namespace App\Http\Controllers;
use App\Models\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ResourcesController extends Controller
{
    public function index(Request $request ,$classid,$subjectid)
    {
        //dd($res);
        $search=$request->search;
        $term=$request->term;
        // $week=$request->week;
        $day=$request->day;

        if(($term==NULL)||($term=='allt')){
            $res=DB::table('resource')
                    ->where('resource.class_id','=',$classid)
                    ->where('resource.subject_id','=',$subjectid)
                    ->where(function($query) use ($search){
                    $query->where('resource.chapter', 'LIKE', '%'.$search.'%')
                            ->orWhere('resource.resource_type', 'LIKE', '%'.$search.'%')
                            ->orWhere('resource.topic', 'LIKE', '%'.$search.'%')
                            ->orWhere('resource.week', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(10);
        }elseif ($day==NULL) {
            $res=DB::table('resource')
                ->where('resource.class_id','=',$classid)
                ->where('resource.subject_id','=',$subjectid)
                ->where('resource.term','=',$term)
                ->paginate(10);
        }else {
            $res=DB::table('resource')
                ->where('resource.class_id','=',$classid)
                ->where('resource.subject_id','=',$subjectid)
                ->where('resource.term','=',$term)
                ->where('resource.day','=',$day)
                ->paginate(10);
        }

        $note=DB::table('resource')
        ->where('resource.class_id','=',$classid)
        ->where('resource.subject_id','=',$subjectid)
        ->where('resource.resource_type','=','note')
        ->orderBy('resource.created_at','desc')
        ->limit(10)
        ->paginate(5);

        $clink=DB::table('resource')
        ->where('resource.class_id','=',$classid)
        ->where('resource.subject_id','=',$subjectid)
        ->where('resource.resource_type','=','class_link')
        ->orderBy('resource.created_at','desc')
        ->limit(10)
        ->paginate(5);

        $d=DB::table('subject_class')
        ->where('subject_class.class_id','=',$classid)
        ->where('subject_class.subject_id','=',$subjectid)
        ->join('subject','subject.id','=','subject_class.subject_id')
        ->join('class','class.id','=','subject_class.class_id')
        ->select('subject_name as subject','class_name as class','class.id as classid','subject.id as subjectid')
        ->first();
       return view('teacher.Resources.index',compact(['res','classid','subjectid','note','clink','d']));



    }



    public function store(Request $req,$classid,$subjectid)
    {
        $req->validate([
            'file'=>'mimes:pdf,doc'
        ]);

        $date=Carbon::createFromFormat('Y-m-d', $req->date)->format('y/m/d/l/W');
        $datearr=explode("/",$date);
        $day=$datearr[3];
        $week="week".$datearr[4]%17;


        if(isset($req->file)){
            $path=$req->file;
            $name = $path->getClientOriginalName();
            $path->move('notes',$name);
        }else{
            $name=$req->link;
        }
        // if(isset($req->extraweek)){
        //     $extra=$req->extraweek;
        //     $week=null;
        // }else{
        //     $extra=null;
        //     $week=$req->week;
        // }

        Resource::create(
            [
                'date'=>$req->date,
                'chapter'=>$req->title,
                'topic'=>$req->description,
                'resource_file'=>$name,
                'term'=>$req->term,
                'week'=>$week,
                'day'=>$day,
                'period'=>$req->period,
                'resource_type'=>$req->type,
                'class_id'=>$classid,
                'subject_id'=>$req->subjectid,
                'teacher_id'=>Auth::user()->id
            ]

            );
            return redirect()->route('res.index',[$classid,$subjectid])->with('message','Resources added successfully');



    }


    public function resupdate(Request $req)
    {
        $req->validate([
            'file'=>'mimes:pdf,doc'
        ]);
       $date=Carbon::createFromFormat('Y-m-d', $req->date)->format('y/m/d/l/W');
       $datearr=explode("/",$date);
       $day=$datearr[3];
       $week="week".$datearr[4]%17;

        $res=Resource::find($req->resid);
        if(isset($req->file)){
            $path=$req->file;
            $name = $path->getClientOriginalName();
            $path->move('notes',$name);
        }else{
            $name=$req->link;
        }
        $res->date=$req->date;
        $res->chapter=$req->chapter;
        $res->topic=$res->topic;
        $res->term=$req->term;
        $res->week=$week;
        $res->day=$day;
        $res->period=$req->period;
        $res->resource_type=$req->type;
        $res->resource_file=$name;
        $classid=$res->class_id;
        $subjectid=$res->subject_id;

        $res->save();
        //dd($classid);
        //return dd($req->assignments->getClientOriginalName());

        return redirect()->route('res.index',[$classid,$subjectid])->with('message','Resources updated successfully');


    }

    public function destroy_res(Request $req){
        $res=Resource::find($req->resid);
        $res->delete();
        return back()->with('message','Succesfully Deleted the Record');
    }
}
