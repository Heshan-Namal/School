<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\User;
use App\Models\Facility_Fees;
use App\Models\Student_Fees;
use Carbon\Carbon;
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
        //need to add user_id=teacher-id;
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


    public function Storefees(Request $request){
        $fee = new Facility_Fees;
        $fee->year = Carbon::now()->format('Y');
        $fee->grade_id = $request->grade_id;
        $fee->note = $request->note;
        $fee->amount = $request->amount;
        $fee->save();

        return redirect()->back();

    }


    public function Addfees(){
        // $grade=DB::table('grade')
        // ->where('grade.year','=',Carbon::now()->format('Y'))
        // ->get();

        $fees=DB::table('facility_fees')
        ->join('grade','grade.id','=','facility_fees.grade_id')
        ->where('facility_fees.year','=',Carbon::now()->format('Y'))
        ->get();
        //dd($fees);
        $grade = Grade::all();
        return view('Admin.Addfees' , compact(['grade','fees']));

    }

    public function studentfees(Request $request){
        if ($request->id == null) {
            $stdnum=Student::count();
            $sub=DB::table('student_fees')
            ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
            ->where('facility_fees.year','=',Carbon::now()->format('Y'))
            ->count();
            //dd($sub);
            $stdfees=DB::table('student_fees')
            ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
            ->join('student','student.admission_no','=','student_fees.admission_no')
            ->join('grade','grade.id','=','facility_fees.grade_id')
            ->join('class','class.grade_id','=','grade.id')
            ->where('facility_fees.year','=',Carbon::now()->format('Y'))
            ->get();

        }else{
            $stdnum=DB::table('student')
            ->where('student.grade_id','=',$request->id)
            ->count();
            $sub=DB::table('student_fees')
            ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
            ->where('facility_fees.grade_id','=',$request->id)
            ->where('facility_fees.year','=',Carbon::now()->format('Y'))
            ->count();
            $stdfees=DB::table('student_fees')
            ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
            ->join('student','student.admission_no','=','student_fees.admission_no')
            ->join('grade','grade.id','=','facility_fees.grade_id')
            ->join('class','class.grade_id','=','grade.id')
            ->where('facility_fees.grade_id','=',$request->id)
            ->where('facility_fees.year','=',Carbon::now()->format('Y'))
            ->get();
        }
        // $grade=DB::table('grade')
        // ->where('grade.year','=',Carbon::now()->format('Y'))
        // ->get();
        $grade = Grade::all();
        return view('Admin.student_fees' , compact(['grade','stdnum','sub','stdfees']));

    }


    public function getstd_fees(){

        $std=DB::table('facility_fees')
            ->join('student','student.grade_id','=','facility_fees.grade_id')
            //->where('student','student.grade_id','=','facility_fees.grade_id')
            //->where('student.admission_no','=',Auth::user()->id)
            ->first();
            $stdsub=DB::table('student_fees')
            ->join('student','student.admission_no','=','student_fees.admission_no')
            ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
            ->where('facility_fees.year','=',Carbon::now()->format('Y'))
            ->get();

        //dd($std1);
        return view('Student.student_fees' , compact(['std','stdsub']));

    }

    public function Storestdfees(Request $request){

        $request->validate([
            'proof'=>'mimes:jpg,png,jpeg'
        ]);

        if(isset($request->proof)){
            $path=$request->proof;
            $name = $path->getClientOriginalName();
            $path->move('fee-proof',$name);
        }else{
            $name=NULL;
        }

        $stdfee = new Student_Fees;
        $stdfee->admission_no='s1';
        $stdfee->fee_id = $request->id;
        $stdfee->proof = $name;
        $stdfee->save();

        return redirect()->back();


    }
}
