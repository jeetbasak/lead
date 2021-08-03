<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\Admin;
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
        $this->middleware('admin.guest:admin');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }

    public function showForget()
    {
        return view('admin.modules.forget_password.forget_password');
    }

    public function sendMail(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        // checking if the admin is valid or not
        if ($admin === null) {
           return back()->with('error','This email is not registered yet');
        }else{
            $updated = Admin::where('email',$request->email)->update(['vcode'=>time()]);
            $getdata = Admin::where('email',$request->email)->first(); 
            $data = [
                'email'=>$request->email,
                'name'=>$getdata->name,
                'vcode'=>$getdata->vcode,
                'admin'=>'admin',
            ];
            Mail::send(new ResetPassword($data));
            return back()->with('success','A reset password link send to your email');
        }
    }

    public function resetpassword($vcode)
    {
        $data = Admin::where('vcode',$vcode)->first();
       if ($data===null) {
           return redirect()->route('admin.login');
       }
        return view('admin.modules.forget_password.reset_password',compact('data'));
    }

    public function newPassword(Request $request)
    {
        $password = $request->input('password'); 
        
        $updatepassword = Admin::where('id',$request->id)->update([
            'password'=>Hash::make($password),
            'vcode'=>''
        ]); 

        return redirect()->route('admin.login');
    }

}
