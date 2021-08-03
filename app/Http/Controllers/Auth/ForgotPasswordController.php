<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPassword;
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

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showForget()
    {
        return view('frontend.modules.forget_password.forget_password');
    }

    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // checking if the user is valid or not
        if ($user === null) {
           return back()->with('error','This email is not registered yet');
        }else{
            $updated = User::where('email',$request->email)->update(['vcode'=>time()]);
            $getdata = User::where('email',$request->email)->first(); 
            $data = [
                'email'=>$request->email,
                'name'=>$getdata->name,
                'vcode'=>$getdata->vcode
            ];
            Mail::send(new ResetPassword($data));
            return back()->with('success','A reset password link send to your email');
        }
    }

    public function resetpassword($vcode)
    {
       
       $data = User::where('vcode',$vcode)->first();
       if ($data===null) {
           return redirect()->route('login');
       }
        return view('frontend.modules.forget_password.reset_password',compact('data'));
    }

    public function newPassword(Request $request)
    {
        $password = $request->input('password'); 
        $updatepassword = User::where('id',$request->id)->update([
            'password'=>Hash::make($password),
            'vcode'=>''
        ]); 

        return redirect()->route('login');
             
    }
}
