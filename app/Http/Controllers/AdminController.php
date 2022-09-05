<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
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
        return redirect('/addteacher')->with(compact('teacher'))->with('success', 'Teacher added successfully');

    }

    public function AddNewStudent(){
        $grade = Grade::all();
        $classroom = Classroom::all();
        $student = Student::all();
        return view('Admin.addStudent', compact(['grade','classroom','student']));

    }
    public function AddNewClass(){
        $grade = Grade::all();
        $teacher = Teacher::all();
        $classroom = Classroom::all();
        return view('Admin.AddClass', compact(['grade','classroom','teacher']));

    }
    public function AddStudent(Request $request){
        $request->validate([
            'Email'=>'required|unique:user',
            'admission_no'=>'required|unique:student',
            'Full_name'=>'required',
            'address'=>'required',
            'dob'=>'required',
            'class_id'=>'required',
            'guardian_name'=>'required',
            'guardian_email'=>'required|email|unique:student',
            'guardian_contact_no'=>'required|max:10',

        ]);
        
        $grade_id = DB::table('class')
        ->where('id', '=', $request->class_id)
        ->select('grade_id as id')
        ->get();
        
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
        $student->grade_id= $grade_id[0]->id;
        $student->class_id= $request->class_id;
        $student->save();

        // $grade = Grade::all();
        $classroom = Classroom::all();

        return back()->with('success', 'Student has been added successfully.');

    }
    // public function getClass($id){
    //     $html = '';
    //     $classes=Classroom::where('grade_id',$id)->get();
    //     foreach($classes as $class)
    //         $html.='<option value="' .$class->id + '">'  .$class->class_name . '</option>';
    //     return response()->json($html);
  

    // }

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


    // public function getstd_fees(){

    //     $std=DB::table('facility_fees')
    //         ->join('student','student.grade_id','=','facility_fees.grade_id')
    //         //->where('student','student.grade_id','=','facility_fees.grade_id')
    //         //->where('student.admission_no','=',Auth::user()->id)
    //         ->first();
    //         $stdsub=DB::table('student_fees')
    //         ->join('student','student.admission_no','=','student_fees.admission_no')
    //         ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
    //         ->where('facility_fees.year','=',Carbon::now()->format('Y'))
    //         ->where('student.admission_no','=','s3')
    //         ->get();

    //    // dd($stdsub);
    //     return view('Student.student_fees' , compact(['std','stdsub']));

    // }

    // public function Storestdfees(Request $request){

    //     $request->validate([
    //         'proof'=>'mimes:jpg,png,jpeg'
    //     ]);

    //     if(isset($request->proof)){
    //         $path=$request->proof;
    //         $name = $path->getClientOriginalName();
    //         $path->move('fee-proof',$name);
    //     }else{
    //         $name=NULL;
    //     }

    //     $stdfee = new Student_Fees;
    //     $stdfee->admission_no='s2';
    //     $stdfee->fee_id = $request->id;
    //     $stdfee->proof = $name;
    //     $stdfee->save();

    //     return redirect()->back();


    // }


    // public function Storefees(Request $request){
    //     $fee = new Facility_Fees;
    //     $fee->year = Carbon::now()->format('Y');
    //     $fee->grade_id = $request->grade_id;
    //     $fee->note = $request->note;
    //     $fee->amount = $request->amount;
    //     $fee->save();

    //     return redirect()->back();

    // }


    // public function Addfees(){
    //     // $grade=DB::table('grade')
    //     // ->where('grade.year','=',Carbon::now()->format('Y'))
    //     // ->get();

    //     $fees=DB::table('facility_fees')
    //     ->join('grade','grade.id','=','facility_fees.grade_id')
    //     ->where('facility_fees.year','=',Carbon::now()->format('Y'))
    //     ->get();
    //     //dd($fees);
    //     $grade = Grade::all();
    //     return view('Admin.Addfees' , compact(['grade','fees']));

    // }

    // public function studentfees(Request $request){
    //     if ($request->id == null) {
    //         $stdnum=Student::count();
    //         $sub=DB::table('student_fees')
    //         ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
    //         ->where('facility_fees.year','=',Carbon::now()->format('Y'))
    //         ->count();
    //         //dd($sub);
    //         $stdfees=DB::table('student_fees')
    //         ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
    //         ->join('student','student.admission_no','=','student_fees.admission_no')
    //         ->join('grade','grade.id','=','facility_fees.grade_id')
    //         ->join('class','class.grade_id','=','grade.id')
    //         ->where('facility_fees.year','=',Carbon::now()->format('Y'))
    //         ->get();

    //     }else{
    //         $stdnum=DB::table('student')
    //         ->where('student.grade_id','=',$request->id)
    //         ->count();
    //         $sub=DB::table('student_fees')
    //         ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
    //         ->where('facility_fees.grade_id','=',$request->id)
    //         ->where('facility_fees.year','=',Carbon::now()->format('Y'))
    //         ->count();
    //         $stdfees=DB::table('student_fees')
    //         ->join('facility_fees','facility_fees.id','=','student_fees.fee_id')
    //         ->join('student','student.admission_no','=','student_fees.admission_no')
    //         ->join('grade','grade.id','=','facility_fees.grade_id')
    //         ->join('class','class.grade_id','=','grade.id')
    //         ->where('facility_fees.grade_id','=',$request->id)
    //         ->where('facility_fees.year','=',Carbon::now()->format('Y'))
    //         ->get();
    //     }
    //     // $grade=DB::table('grade')
    //     // ->where('grade.year','=',Carbon::now()->format('Y'))
    //     // ->get();
    //     $grade = Grade::all();
    //     return view('Admin.student_fees' , compact(['grade','stdnum','sub','stdfees']));

    // }


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
    public function EditGrade($grade_id)
    {
        $gradeName = DB::table('grade')
        ->where('grade.id','=',$grade_id)
        ->select( '*')
        ->get();
        //
        $Classroom = DB::table('teacher_subject')
            
            ->join('teacher', 'teacher_subject.teacher_id', '=', 'teacher.id')
            ->join('subject', 'teacher_subject.subject_id', '=', 'subject.id')
            ->where('subject.grade_id','=',$grade_id)
            ->select( 'teacher_subject.*','subject.subject_name as sub', 'teacher.full_name as name')
            ->get();
        $teacher_class = DB::table('teacher_class')
            ->join('teacher', 'teacher_class.teacher_id', '=', 'teacher.id')
            ->join('class', 'teacher_class.class_id', '=', 'class.id')
            ->select( 'teacher_class.*','class.class_name as cls', 'teacher.full_name as name')
            ->get();    
       // $teacher_class = teacher_class::orderBy('id','desc')->get();
        $teacher = Teacher::orderBy('id','desc')->get();
        $subject = Subject::orderBy('id','desc')->get();
        
        $class = DB::table('class')
        ->where('grade_id','=',$grade_id)
        ->select( '*')
        ->get();
        

        return view('Admin.EditGrade',compact('Classroom','teacher_class','teacher','subject','class','gradeName'));
    }

//     public function Storefees(Request $request){
//         $fee = new Facility_Fees;
//         $fee->year = Carbon::now()->format('Y');
//         $fee->grade_id = $request->grade_id;
//         $fee->note = $request->note;
//         $fee->amount = $request->amount;
//         $fee->save();

//         return redirect()->back();

// }
}