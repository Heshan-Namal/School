<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
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
        return view('Admin.addGrade',$data,$data2);
    }
    public function AddGrade(Request $request){
        $request->validate([
            'grade_name'=>'required|unique:grade'
        ]);
        $grade = new Grade;
        $grade->grade_name=$request->grade_name;
        $grade->admin_id=auth::user()->id;
        $grade->save();
        return redirect('grade/add');
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
         return redirect('grade/add');
    }

    public function AddTeacher(){
        return redirect('grade/add');
        return view('Admin.addStudent');

    }

    public function AddNewStudent(){
        return view('Admin.addStudent');

    }
    public function AddNewTeacher(){
        return view('Admin.addTeacher');

    }
}
