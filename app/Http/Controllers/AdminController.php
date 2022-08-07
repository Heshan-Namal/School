<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    
    public function CreatNewGrade(){
        $data = array(
            'list'=>DB::table('grade')->get()
        );
        $data2 = array(
            'list2'=>DB::table('class')->get()
        );
        $teacher = Teacher::all();
        
        return view('Admin.addGrade',$data,$data2)->with(compact('teacher'));
    }
    public function AddGrade(Request $request){
        $request->validate([
            'grade_name'=>'required|unique:grade'
        ]);
        $grade = new Grade;
        $grade->grade_name=$request->grade_name;
        $grade->admin_id=auth::user()->id;
        $grade->save();
        $teacher = Teacher::all();
        return redirect('grade/add')->with(compact('teacher'));
    }
// add calsses here****
    public function AddClass(Request $request){
        // $request->validate([
            //     'class_name'=>'required|unique:class'
            // ]);
            $class = new Classroom;
            $class->class_name=$request->Class_name;
            $class->grade_id=$request->grade_id;
            $class->admin_id=auth::user()->id;
            $class->save();
            $teacher = Teacher::all();
         return redirect('grade/add')->with(compact('teacher'));
    }

    public function AddTeacher(Request $request){
        $request->validate([
            'Email'=>'required|unique:user'
        ]);
        $user = new User;
        $user->email = $request->Email;
        $user->user_type = "teacher";
        $user->password = Hash::make('viduhalapwd');
        $user->save();
        
        $user_id = DB::table('user')
        ->where('email', '=', $request->Email)
        ->get('id');

        $teacher = new Teacher;
        $teacher->full_name=$request->Full_name;
        $teacher->contact_no=$request->Contact_Number;
        $teacher->address=$request->Address;
        $teacher->photo='public\assets\front\images\defualt.jpg';
        $teacher->admin_id=auth::user()->id;
        $teacher->user_id= $user_id[0]->id ;
        $teacher->save();

        $teacher = Teacher::all();
        return redirect('/addteacher')->with(compact('teacher'));

    }

    public function AddNewStudent(){
        $grade = Grade::all();
        $classroom = Classroom::all();
        return view('Admin.addStudent', compact('grade','classroom'));

    }
    public function AddNewTeacher(){
        $teacher = Teacher::all();
        return view('Admin.addTeacher' , compact('teacher'));

    }
}
