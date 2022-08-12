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

        // <<<<------ Notification--------->>>>
        $notification = array(
            'message' => 'Successfully add teacher record!', 
            'alert-type' => 'success'
        );


        return redirect('grade/add')->with(compact('teacher'))->with($notification);
    }
// add calsses here****
    public function AddClass(Request $request){
        // $request->validate([
            //     'class_name'=>'required|unique:class'
            // ]);
            
            // dd($request->teacher_id);
            $class = new Classroom;
            $class->class_name=$request->class_name;
            $class->grade_id=$request->grade_id;
            $class->teacher_id=$request->teacher_id;
            $class->admin_id=auth::user()->id;
            $class->save();

            $grade = Grade::all();
            $teacher = Teacher::all();
            $classroom = Classroom::all();
            return view('Admin.AddClass', compact(['grade','classroom','teacher']));
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
    public function AddNewClass(){
        $grade = Grade::all();
        $teacher = Teacher::all();
        $classroom = Classroom::all();
        return view('Admin.AddClass', compact(['grade','classroom','teacher']));

    }
    public function AddStudent(){
        $request->validate([
            'Email'=>'required|unique:user',
            'admission_no'=>'required|unique:student'
        ]);

        $user = new User;
        $user->email = $request->Email;
        $user->user_type = "student";
        $user->password = Hash::make('viduhalapwd');
        $user->save();

        $user_id = DB::table('user')
        ->where('email', '=', $request->Email)
        ->get('id');

        $student = new Student;
        $student->full_name=$request->Full_name;
        $student->dob=$request->dob;
        $student->guardian_name=$request->guardian_name;
        $student->admission_no=$request->admission_no;
        $student->guardian_email=$request->guardian_email;
        $student->guardian_contact_no=$request->guardian_contact_no;
        $student->address=$request->address;
        $student->photo='public\assets\front\images\defualt.jpg';
        $student->admin_id=auth::user()->id;
        $student->user_id= $user_id[0]->id ;
        $student->grade_id= $request->grade_id;
        $student->class_id= $request->class_id;
        $student->save();

        $grade = Grade::all();
        $classroom = Classroom::all();

        return redirect('Admin.addStudent', compact('grade','classroom'));

    }
    public function SelectGrade(Request $request){
        $data=Classroom::select('class_name','id')
        ->where('id',$request->id)->take(100)->get();
        return response()->json($data);

    }

    public function AddNewTeacher(){
        $teacher = Teacher::all();
        return view('Admin.addTeacher' , compact('teacher'));

    }
}
