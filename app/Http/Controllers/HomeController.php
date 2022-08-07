<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Qs;
use App\Models\Student_subject;
use App\Models\Student;
use App\Models\Subject;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;


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

    public function dashboard()
    {
        $d=[];
        if(Qs::userIsTeamAll()){
            $d['users'] = $this->user->getAll();
        }
        if(Qs::userIsTeamLe()){
            // select classes for today from class timetable
            $d['users'] = $this->user->getAll();

            $student_id = Auth::user()->id;
            $admission_no =Student::where('user_id',$student_id)->pluck('admission_no')->first();
            $grade_id =Student::where('user_id',$student_id)->pluck('grade_id')->first();
            $subject_id = Student_subject::where('admission_no',$admission_no)->pluck('subject_id');
            $subjects=Subject::all()->whereIn('id',$subject_id)->where('grade_id',$grade_id);
            return view('Dashboard.dashboard',compact(['d','subjects']));
            
        }


        return view('Dashboard.dashboard', $d);
    }
}
