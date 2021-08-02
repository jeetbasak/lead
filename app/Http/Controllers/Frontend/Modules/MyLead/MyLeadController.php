<?php

namespace App\Http\Controllers\Frontend\Modules\MyLead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManageLead;
use App\Models\Notification;
use App\User;
use Auth;

class MyLeadController extends Controller
{
   

    public function lead_list(Request $request){
 	$userId=Auth::user()->id;
 	//dd(date('Y')+1-1);
 	$data['leads']=ManageLead::where('tagging_id',$userId)->get();
 	return view('frontend.modules.lead.lead')->with($data);
 }



 public function change_status(Request $request){
 	//dd($request->all());
 	if($request->status==""){
 		return back()->with('error','Please select a status');
 	}

 	ManageLead::where('id',$request->lead_id)->update(['application_status'=>$request->status,'comment'=>$request->comment]);

    if($request->status=="C"){
 	 //notification sent code to admin
            @$u=User::where('id',Auth::user()->id)->first();
            $notification=new Notification();

            $notification->user_type='A';
            $notification->not_type='Lead completed';
            $notification->message='Lead completed of '.@$u->email;

            $notification->save();  
    }

     if($request->status=="R"){
 	 //notification sent code to admin
            @$u=User::where('id',Auth::user()->id)->first();
            $notification=new Notification();

            $notification->user_type='A';
            $notification->not_type='Lead rejected';
            $notification->message='Lead rejected of '.@$u->email;

            $notification->save();  
    }

 	return back()->with('siccess','Status changed');
 }
}
