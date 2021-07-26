<?php

namespace App\Http\Controllers\Frontend\Modules\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\State;
use App\User;
use Mail;
use App\Mail\EmailVerification;

class DashboardController extends Controller
{
    public function home(){
		return view('frontend.modules.dashboard.dashboard');
    }





    public function getstate(Request $request)
    {
    	$data = State::where('country_id',$request->country)->get();
        $response=array();
        $result="<option value=''>Select State</option>";
        if(@$data->isNotEmpty())
        {
            foreach($data as $rows)
            {
                if(@$request->id==$rows->id)
                {
                    $result.="<option value='".$rows->id."' selected >".$rows->name."</option>";
                }

                else
                {
                    $result.="<option value='".$rows->id."' >".$rows->name."</option>";
                }
                
            }
        }
        $response['state']=$result;
        return response()->json($response);
    }








    public function reg_one(Request $request){
    	
	    
       
        //Not submit the form once it submitted and if someone get out after 1st step the redirect to 2nd step
    	$srch=User::where('email',$request->email)->where('reg_status',1)->where('status','IP')->first();
    	//dd($srch);
    	if($srch){
    		$data['id']=$srch->id;
    		 return view('frontend.modules.dashboard.reg_two')->with($data);
    	}
        
         //Not submit the form once it submitted and if someone get out after 2nd step the redirect to 3nd step
    	$srch2=User::where('email',$request->email)->where('reg_status',2)->where('status','IP')->first();
    	//dd($srch);
    	if($srch2){
    		$data['id']=$srch2->id;
    		 return view('frontend.modules.dashboard.reg_three')->with($data);
    	}

    	//dublicate email checking..
    	 $is_email = User::where('email',$request->email)->whereIn('status',['A','AA','IP'])->count();
	     //dd($is_email);	     
	     if($is_email>0){      
          return back()->with('error','Email already exist');
	    }

    	
    	 $request->validate([
    	 	'name' => 'required',
            'email' => 'required',
            'qualification' => 'required',
            'country' => 'required',
            'state' => 'required'            
        ]);
       
       $password=mt_rand(10000000,99999999);
        $otp=mt_rand(100000,999999);

        $user_ins=new User();
        $user_ins->name=$request->name;      
        $user_ins->email=$request->email;
        $user_ins->last_qualification=$request->qualification;
        $user_ins->country_id=$request->country;
        $user_ins->state_id=$request->state;
        $user_ins->password=Hash::make($password);
        $user_ins->otp=$otp;
        $user_ins->reg_status=1;

        //$user_ins->application_date=date('Y-m-d H:i:s');
       
        $user_ins->save();
        $w=array(
        	'id'=>$user_ins->id
        );

        $data = [
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=> $password,
           'vcode'=>$otp,
        ];
        Mail::send(new EmailVerification($data));
       // return back()->with('success','Registration first step completed..!');
        return view('frontend.modules.dashboard.reg_two')->with($w);

    }












    public function reg_two(Request $request){
    	//dd($request->all());
    	// $srch=User::where('id',$request->id)->where('reg_status',2)->first();
    	// if($srch){
    	// 	 $w=array(
     //    	'id'=>$request->id
     //          );
    	// 	 return view('frontend.modules.dashboard.reg_three')->with($w);
    	// }
    	$upd=array(
    		'ph'=>$request->ph,
    		'work_exp'=>$request->work_exp,
    		'reg_status'=>2
    	);
    	User::where('id',$request->id)->update($upd);
    	 $w=array(
        	'id'=>$request->id
        );
    	 return view('frontend.modules.dashboard.reg_three')->with($w);
    }






    public function verification(Request $request){
    	//dd($request->all());
    	$srch=User::where('id',$request->id)->where('reg_status',3)->first();
    	if($srch){
    		return redirect()->route('login');
    	}
    	$check = User::where('id',$request->id)->where('otp',$request->code)->first();
    	if ($check==null) {
    		//User::where('id',$request->id)->update(['otp_status'=>'N']);
    		$w=array(
        	'id'=>$request->id,
        	'msg'=>'hhhh'
        ); 
    		return view('frontend.modules.dashboard.reg_three')->with($w);
    	}else{
    		$update = User::where('id',$request->id)->update(['reg_status'=>3,'otp'=>0,'status'=>'AA','otp_status'=>'Y']);
    		return redirect()->route('login');
    	}

    }








    public function reg_2nd_page($id){
    	//dd($id);
    	$data['user']=User::where('id',$id)->first();

    	return view('frontend.modules.dashboard.go_back')->with($data);
    }

    public function update(Request $request){
    	//dd($request->all());
    	$update = User::where('id',$request->id)->update(['reg_status'=>2,'ph'=>$request->ph,'work_exp'=>$request->work_exp]);

    	 $w=array(
        	'id'=>$request->id
        );

    	 return view('frontend.modules.dashboard.reg_three')->with($w);
    }
}
