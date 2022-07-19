<?php

namespace App\Http\Controllers;
use App\Models\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index(Request $request ,$classid,$subjectid)
    {
        //dd($res);
        $term=$request->term;
        $week=$request->week;
        $day=$request->day;
        if($term==NULL){
            $res=DB::table('resource')
        ->where('resource.class_id','=',$classid)
        ->where('resource.subject_id','=',$subjectid)
        ->get();
        }
        elseif($week==NULL){
            $res=DB::table('resource')
            ->where('resource.class_id','=',$classid)
            ->where('resource.subject_id','=',$subjectid)
            ->where('resource.term','=',$term)
            ->get();
        }elseif($day==NULL){
            if($week == 'extra'){
                $res=DB::table('resource')
                ->where('resource.class_id','=',$classid)
                ->where('resource.subject_id','=',$subjectid)
                ->where('resource.term','=',$term)
                ->whereNotNull('resource.extra_week')
                ->get();
            }else{
                $res=DB::table('resource')
                ->where('resource.class_id','=',$classid)
                ->where('resource.subject_id','=',$subjectid)
                ->where('resource.term','=',$term)
                ->where('resource.week','=',$week)
                ->get();
            }

        }else{
            if($week == 'extra'){
                $res=DB::table('resource')
                ->where('resource.class_id','=',$classid)
                ->where('resource.subject_id','=',$subjectid)
                ->where('resource.term','=',$term)
                ->where('resource.day','=',$day)
                ->whereNotNull('resource.extra_week')
                ->get();
            }else{
                $res=DB::table('resource')
                ->where('resource.class_id','=',$classid)
                ->where('resource.subject_id','=',$subjectid)
                ->where('resource.term','=',$term)
                ->where('resource.week','=',$week)
                ->where('resource.day','=',$day)
                ->get();
            }
        }

        $note=DB::table('resource')
        ->where('resource.class_id','=',$classid)
        ->where('resource.subject_id','=',$subjectid)
        ->where('resource.resource_type','=','note')
        ->orderBy('resource.created_at','desc')
        ->limit(4)
        ->get();

        $clink=DB::table('resource')
        ->where('resource.class_id','=',$classid)
        ->where('resource.subject_id','=',$subjectid)
        ->where('resource.resource_type','=','class_link')
        ->orderBy('resource.created_at','desc')
        ->limit(4)
        ->get();

        // $detail=DB::table('Subject_class')
        // ->where('Subject_class.class_id','=',$classid)
        // ->where('Subject_class.subject_id','=',$subjectid)
        // ->join('Subject','Subject.id','=','Subject_class.subject_id')
        // ->join('Class','Class.id','=','Subject_class.class_id')
        // ->select('Subject.name as subject','Class.name as class','Class.id as classid','Subject.id as subjectid')
        // ->get();

       return view('teacher.Resources.index',compact(['res','classid','subjectid','note','clink']));



    }



    public function store(Request $req,$classid,$subjectid)
    {

        //return dd($req->assignments->getClientOriginalName());
        //dd($req);
        if(isset($req->file)){
            $path=$req->file;
            $name = $path->getClientOriginalName();
            $path->move('notes',$name);
        }else{
            $name=$req->link;
        }
        if(isset($req->extraweek)){
            $extra=$req->extraweek;
            $week=null;
        }else{
            $extra=null;
            $week=$req->week;
        }

        Resource::create(
            [
                'chapter'=>$req->title,
                'topic'=>$req->description,
                'resource_file'=>$name,
                'term'=>$req->term,
                'week'=>$week,
                'extra_week'=>$extra,
                'day'=>$req->day,
                'resource_type'=>$req->type,
                'class_id'=>$classid,
                'subject_id'=>$req->subjectid,
                'teacher_id'=>Auth::user()->id
            ]

            );
            return redirect()->route('res.index',[$classid,$subjectid])->with('message','Resources added successfully');



    }
}
