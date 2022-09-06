<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Edit_Profile($userid){

        $user_type=DB::table('user')
        ->where('id','=',$userid)
        ->select('user_type')
        ->get();
        $ad=0;
        $st=0;
        $te=0;
        if($user_type[0]->user_type == 'teacher'||$user_type == 'class_teacher'){
            $result=DB::table('teacher')
            ->where('user_id','=',$userid)
            ->select('teacher.*')
            ->get();
            $te=1;
            
        }
        else if($user_type[0]->user_type == 'student'){
            $result=DB::table('student')
            ->join('grade','grade.id','=','student.grade_id')
            ->join('class','student.class_id','=','class.id')
            ->where('student.user_id','=',$userid)
            ->select('student.*','grade.grade_name as gname','class.class_name as cname')
            
            ->get();
            $st=1;
            
        }
        else{ $result=DB::table('admin')
            ->where('user_id','=',$userid)
            ->select('*')
            ->get();
            $ad=1;
        }
            
        
            
        
        
        $result2=DB::table('user')
        ->where('id','=',$userid)
        ->select('email')
        ->get();
        $result3= DB::table('comment')
            ->where('comment.user_id','=',$userid)
            ->join('teacher', 'comment.sender_id', '=', 'teacher.user_id')
            ->select( 'comment.*', 'teacher.full_name as name')
            ->get();
        
        return view('Profile.editprofile',compact(['result','result2','result3','ad','st','te']));
    }
    public function Update_Profile(Request $request){
        
        if(Auth::user()->user_type == 'teacher'){
            Teacher::where('id', Auth::user()->id)->update([
                'full_name'=>$request->name,
                'contact_no'=>$request->phone,
                'address'=>$request->address,
            ]);
        }
        else if(Auth::user()->user_type == 'student'){
            Student::where('id', Auth::user()->id)->update([
                'full_name'=>$request->name,
                'dob'=>$request->dob,
                'guardian_name'=>$request->gname,
                'guardian_email'=>$request->gemail,
                'guardian_contact_no'=>$request->gcontact,
                'address'=>$request->address,
            ]);
        }
        else{   
            Admin::where('id', Auth::user()->id)->update([
                'full_name'=>$request->name,
                'contact_no'=>$request->phone,
                'adress'=>$request->address,
            ]);
    }
    User::where('id', Auth::user()->id)->update([
        'email'=>$request->email
    ]);
    return back()->with('success', 'Your Bio data has been updated successfully.');
    }
    public function Update_Profilepic(Request $request){
       
        
        if($request->hasFile('image')){
            $destination_path = 'public/assets/front/images/avatars';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            
            
        }
        
        if(Auth::user()->user_type == 'teacher'||Auth::user()->user_type == 'class_teacher'){
            Teacher::where('id', Auth::user()->id)->update([
                'photo'=>$image_name,
                
            ]);
            
            
        }
        else if(Auth::user()->user_type == 'student'){
            Student::where('id', Auth::user()->id)->update([
                'photo'=>$image_name,
            ]);
            
        }
        else{ Admin::where('id', Auth::user()->id)->update([
            'photo'=>$image_name,
        ]);
        }

        return back()->with('success', 'Your Profile Picture has been updated successfully.');
    }
    // public function View_student($userid){

    //     $result=DB::table('student')
    //     ->where('id','=',$userid)
    //     ->select('*')
    //     ->get();
    //     $result2=DB::table('user')
    //     ->where('id','=',$userid)
    //     ->select('email')
    //     ->get();
        
        
    //     return view('Student.student_view');
    // }
    // public function View_teacher(){
    //     // return back()->with('success', 'Your Profile Picture has been updated successfully.');
    // }
}