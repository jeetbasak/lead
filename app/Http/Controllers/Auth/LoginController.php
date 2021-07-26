<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


  protected function credentials(Request $request)
    {
       
        return ['email' => $request->{$this->username()}, 'password' => $request->password,'status' => array('A', 'I','AA','IP')];
    }

       protected function authenticated(Request $request, $user)
    {
        // return $user;
        if ($user->status == 'IP') {
            if ($user->reg_status==1) {
                $this->guard()->logout();
              $data['id']=$user->id;  
              return view('frontend.modules.dashboard.reg_two')->with($data);
            }
            if ($user->reg_status==2) {
                $this->guard()->logout();
              $data['id']=$user->id;  
              return view('frontend.modules.dashboard.reg_three')->with($data);
            }
        }
        if ($user->status == 'I') {
            $this->guard()->logout();
            $request->session()->invalidate();
            session()->flash('error', 'User not active contact Admin');
            return redirect()->route('login');
        }
        if ($user->status == 'AA') {
            $this->guard()->logout();
            $request->session()->invalidate();
            session()->flash('error', 'User is in awaiting approval stage');
            return redirect()->route('login');
        }
        if ($user->status == 'A') {
            session()->flash('success', 'login successfully');
            return redirect()->route('dashboard.home');
        }
        $this->guard()->logout();
        $request->session()->invalidate();
        session()->flash('error', 'User not active contact Admin');
        return redirect()->route('login');
    } 

}
