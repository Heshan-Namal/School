<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function password_reset_link(){
        return view('auth.passwords.email');
    }

    public function password_reset(Request $request){

        $request->validate([
            'email'=>'required|email|exists:user,email'
        ]);
        
        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email'=>$request->email,
            'remember_token'=>$token,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        $action_link = route('passwords.reset.form',['remember_token'=>$token,'email'=>$request->email]);
        $body = "We are received a request to reset the password for <b>Your Viduhala </b> account associated with ".$request->email.". You can reset your password by clicking the link below";
        
        \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('noreply@example.com','Viduhala');
            $message->to($request->email,'Admin')
                    ->subject('Reset Password');
      });
      return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function Show_reset_form(Request $request, $token = null){
        return view('auth.passwords.reset')->with(['token'=>$token,'email'=>$request->email]);
    }
    public function Change_password(Request $request){
        
        // dd($request);
        $request->validate([
            'email'=>'required|email|exists:user,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);
        // dd($request);
        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'remember_token'=>$request->token2,
        ])->first();
        
        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{

            User::where('email', $request->email)->update([
                'password'=>\Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('login')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
        
    }


    

    use SendsPasswordResetEmails;
}
