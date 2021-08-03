<?php

namespace App\Http\Controllers\Admin\Modules\Target;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Target;
use App\User;
use App\Models\UserToTarget;
use App\Models\Notification;
use Mail;
use App\Mail\TargetUser;
class TargetManageController extends Controller
{
    
    /**
     *   Method      : taregetList
     *   Description : Taget Listing view
     *   Author      : Sayan
     **/

    public function taregetList()
    {
       $data = [];
         
       $data['targets'] = Target::orderBy('year','asc')->orderBy('month_id','asc')/*->with('users_to_target')*/->where('status','A')->get();
         $data['targetTo']=UserToTarget::get();
         //dd($data['targetTo']);
        
         // dd($data['black']);
         $data['users']=User::where('status','A')->get();   
       return view('admin.modules.target.target_list',$data);
    }







    /**
     *   Method      : addView
     *   Description : Taget Add View
     *   Author      : Sayan
     **/

    public function addView()
    {
      return view('admin.modules.target.target_add');
    }







    /**
     *   Method      : insertTarget
     *   Description : Taget added functionality
     *   Author      : Sayan
     **/

    public function insertTarget(Request $request)
    {
      $request->validate([
            'year' => 'required',
            'month' => 'required',
            'salary' => 'required',
            'from' => 'required',
            'to'=>'required',            
        ]);
      // dd($request->month);
      $explodeMonth=explode('-', $request->month);
      //dd( $explodeMonth);
      $month= $explodeMonth[0]+1;
      $from=$request->from +1-1;
      $to=$request->to +1-1;
     //dd( $month);
        $check = Target::where('status','!=','D')->where('year',(int)$request->year)->where('month_id',$month)->where('from_target','<=',(int)$request->from)->where('to_target','>=',(int)$request->from)->first();
       // dd($check);
        $check2 = Target::where('status','!=','D')->where('year',(int)$request->year)->where('month_id',$month)->where('from_target','<=',(int)$request->to)->where('to_target','>=',(int)$request->to)->first();
        $check3 = Target::where('status','!=','D')->where('year',(int)$request->year)->where('month_id',$month)->where('from_target','<=',(int)$request->to)->where('from_target','>=',(int)$request->from)->where('to_target','<=',(int)$request->to)->first();

         $check4 = Target::where('status','!=','D')->where('year',(int)$request->year)->where('month_id',$month)->where('from_target','<',(int)$request->from)->where('to_target','>',(int)(int)$request->to)->first();

         //dd($check4, $month,(int)$request->from,(int)$request->to);
        if (@$check!="") {
            return redirect()->back()->with('error','This Target Range Already Exits In This Month');
        }
        if (@$check2!="") {
            return redirect()->back()->with('error','This Target Range Already Exits In This Month');
        }
        if (@$check3!="") {
            return redirect()->back()->with('error','This Target Range Already Exits In This Month');
        }
         if (@$check4!="") {
            return redirect()->back()->with('error','This Target Range Already Exits In This Month');
        }
        $target = new Target;
        $target->year = $request->year;
        $m=explode('-',$request->month);
        // dd($m);
        $target->month_id = @$m[0]+1;
        $target->month = @$m[1];
        $target->salary = $request->salary;
        $target->from_target= $request->from;
        $target->to_target = $request->to;
        
        $target->save();
        return redirect()->back()->with('success','Target Added Suucssfully');
    }










    public function getMonth(Request $request)
    {
      if (date('Y')==$request->year) {
        return view('admin.modules.target.target_year_one');
    }
        else{
        return view('admin.modules.target.target_year_two');
      }
    
  }








    public function delTarget($id)
    {
        $check = Target::where('id',$id)->where('status','!=','D')->first();
        if ($check==null) {
             return redirect()->back();
        }
        $check2=UserToTarget::where('target_id',$id)->first();
        if($check2){
          return redirect()->back()->with('error','Target already assing to user');
        }
        $delete = Target::where('id',$id)->update(['status'=>'D']);
        return redirect()->back()->with('success','Target Deleted Successfully');
    }









    public function editTargetView($id)
    {
        $data = Target::where('id',$id)->where('status','!=','D')->first();
        if ($data==null) {
             return redirect()->back();
        }
        return view('admin.modules.target.target_edit',compact('data'));
    }








    public function updateTraget(Request $request)
    {
       $explodeMonth=explode('-', $request->month);
      //dd( $explodeMonth);
      $month= $explodeMonth[0]+1;
      
        $check = Target::where('status','!=','D')->where('year',(int)$request->year)->where('id','!=',$request->id)->where('month_id',$month)->where('from_target','<=',(int)$request->from)->where('to_target','>=',(int)$request->from)->first();
        $check2 = Target::where('status','!=','D')->where('year',(int)$request->year)->where('id','!=',$request->id)->where('month_id',$month)->where('from_target','<=',(int)$request->to)->where('to_target','>=',(int)$request->to)->first();
         $check3 = Target::where('status','!=','D')->where('year',(int)$request->year)->where('id','!=',$request->id)->where('month_id',$month)->where('from_target','<=',(int)$request->to)->where('from_target','>=',(int)$request->from)->where('to_target','<=',(int)$request->to)->first();

          $check4 = Target::where('status','!=','D')->where('year',(int)$request->year)->where('id','!=',$request->id)->where('month_id',$month)->where('from_target','<',(int)$request->from)->where('to_target','>',(int)$request->to)->first();

        if (@$check!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        if (@$check2!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        if (@$check3!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
         if (@$check4!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        
        $request->validate([
            'year' => 'required',
            'month' => 'required',
            'salary' => 'required',
            'from' => 'required',
            'to'=>'required',            
        ]);

        $upd = [];
        $upd['year'] = $request->year;
        $m=explode('-',$request->month);
        // dd($m);
        $upd['month_id'] = @$m[0]+1;
        $upd['month'] = @$m[1];
        $upd['salary'] = $request->salary;
        $upd['from_target'] = $request->from;
        $upd['to_target'] = $request->to;
        $update = Target::where('id',$request->id)->update($upd);
        return redirect()->back()->with('success','Target Updated Successfully');


    }












    public function assing(Request $request){
        $data = []; 
        $uniq = [];
        $data2=[];
        $uniq2 = [];
       

        if (!@$request->user_id) {
          return back()->with('error','Please select user');
        }

        $target_d=UserToTarget::where('target_id',$request->target_id)->get();
        foreach($target_d as $dlt){
          UserToTarget::where('target_id',$dlt->target_id)->delete();
        }

        if (@$request->user_id) {
           foreach (@$request->user_id as $key => $value) {
               $src = UserToTarget::where('user_id',$value)->where('target_month',$request->month)->/*where('target_id',$request->target_id)->*/where('target_year',$request->year)->first();
               if ($src) {
                 array_push($data,$value);
               }else{
               $target = new UserToTarget;
               $target->user_id = $value;
               $target->target_id = $request->target_id;
               $target->target_month = $request->month;
               $target->target_year = $request->year;
               $target->save();
                array_push($data2,$value);


            //notification sent code to admin
            //@$u=User::where('id',$request->user_id)->first();
            $notification=new Notification();

            $notification->user_type='U';
            $notification->user_id=@$value;
            $notification->not_type='New Target';
            $notification->message='New target given to you from admin';
            $notification->save(); 


            // $user_email = User::where('id',$value)->first();
            
           
            // $data['name'] = $user_email->name;
            //   $data['email'] = $user_email->email;
            //  $data['email_subject'] = "Enquiry from Website";
            // // Mail::send(new TargetUser($data));
            //  Mail::to($user_email->email)->send(new TargetUser($data));
             }
            
            

            }
           // if (count(@$data)>0) {
               foreach (@$data as  $value) {
                   $user = User::where('id',$value)->first();
                   array_push($uniq, $user->name);
               }
                  // $a=count($uniq);
                  // $values[] = implode(' , ', array_splice($uniq, -$a));
                  // $str = implode(', ', $values);
                  //return back()->with('error',$str.' are already added');
           // }
           // else{
                $a=count($uniq);
                  $values[] = implode(' , ', array_splice($uniq, -$a));
                  $str1 = implode(', ', $values);
                   //dd(count($str1));

            foreach (@$data2 as  $value) {
                   $user = User::where('id',$value)->first();
                   array_push($uniq2, $user->name);
               }
              

                  $ab=count($uniq2);
                  $values2[] = implode(' , ', array_splice($uniq2, -$ab));
                  $str2 = implode(', ', $values2);
                     // dd($str1,$str2);
                  if(@$str2!='' && @$str1==''){
                    return back()->with('success',@$str2.' added successfully');
                  }
                  elseif (@$str2!='' && @$str1!='') {
                      return back()->with('success',@$str2.' added successfully and '. @$str1. " exists under this year and month");
                  }
                  else{
                     return back()->with('error', @$str1. " exists under this year and month");
                  }


             //return back()->with('success','target assinged to users');
           // }
           // dd($uniq);
          
        }
    }

}
