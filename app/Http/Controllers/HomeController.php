<?php

namespace App\Http\Controllers;
use App\Models\Assessment;
use App\Models\Student_assesment;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\Qs;
use App\Repositories\UserRepo;

use App\Models\User;
use App\Models\Grade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user;
    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        return redirect('dashboard');
    }

    public function dashboard(Request $req)
    {
        $d=[];
        if(Qs::userIsTeamAll()){
            $d['users'] = $this->user->getAll();
        }
        if(Qs::userIsTeamTe()){
            if (($req->mindata == null) && ($req->maxdata == null)) {
                $mindata= Carbon::now()->subDays(7);
                $maxdata=Carbon::now()->addDays(7);
                //dd($maxdata);
                $leaders=DB::table('assessment')
                    ->join('student_assessment','assessment.id','=','student_assessment.assessment_id')
                    ->join('student','student_assessment.admission_no','=','student.admission_no')
                    ->join('class','assessment.class_id','=','class.id')
                    ->where('assessment.due_date','>',$mindata)
                    ->where('assessment.due_date','<',$maxdata)
                    ->select(DB::raw('max(student_assessment.assessment_marks) as max'),'assessment.id','class.class_name','assessment.title')
                    ->groupBy('assessment.id','class.class_name','assessment.title')
                    ->get();
            }else{
                $leaders=DB::table('assessment')
                ->join('student_assessment','assessment.id','=','student_assessment.assessment_id')
                ->join('student','student_assessment.admission_no','=','student.admission_no')
                ->join('class','assessment.class_id','=','class.id')
                ->where('assessment.due_date','>',$req->mindata)
                ->where('assessment.due_date','<',$req->maxdata)
                ->select(DB::raw('max(student_assessment.assessment_marks) as max'),'assessment.id','class.class_name','assessment.title')
                ->groupBy('assessment.id','class.class_name','assessment.title')
                ->get();
            }

            // $now = Carbon::now();
            // dd($now->weekOfYear);
            $data=DB::table('teacher_subject')
            ->where('teacher_subject.teacher_id','=',Auth::user()->id)
            ->join('subject','subject.id','=','teacher_subject.subject_id')
            ->join('subject_class','subject_class.subject_id','=','subject.id')
            ->join('class','class.id','=','subject_class.class_id')
            ->select('subject.subject_name as subject','class.class_name as class','class.id as classid','subject.id as subjectid')
            ->orderBy('class.class_name')
            ->get();

        $cc=DB::table('teacher_subject')
        ->where('teacher_subject.teacher_id','=',Auth::user()->id)
        ->join('subject','subject.id','=','teacher_subject.subject_id')
        ->join('subject_class','subject_class.subject_id','=','subject.id')
        ->join('class','class.id','=','subject_class.class_id')
        ->count();
        $ac=DB::table('attentiveness_check')
        ->where('attentiveness_check.teacher_id','=',Auth::user()->id)
        ->where('attentiveness_check.status', '=', 'draft')
        ->count();
        $nc = DB::table('assessment')
           ->where('assessment.teacher_id',Auth::user()->id)
           ->whereDate('due_date', '>', Carbon::now())
           ->count();

            return view('Dashboard.Teacherdashboard',compact(['leaders','data','cc','ac','nc']));
        }

        $student = User:: where('user_type', 'student')->count();
        $teacher = User:: where('user_type', 'teacher')->count();
        $class_teacher = User:: where('user_type', 'class_teacher')->count();
        $grades = Grade:: count();
        
        return view('Dashboard.dashboard', $d,compact('student','teacher','class_teacher','grades'));
    }
    public function back()
    {
        return redirect()->back();
    }
}