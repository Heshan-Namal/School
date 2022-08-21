<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Edit_Profile($userid){
        if(Auth::user()->user_type == 'teacher'){
            $table = 'teacher';
        }
        else if(Auth::user()->user_type == 'student'){
            $table = 'student';
        }
        else
            $table='admin';
        
        $result=DB::table($table)
        ->where('id','=',$userid)
        ->select('*')
        ->get();
        
        
        return view('Profile.editprofile',)->with(compact('result'));
    }
}
