<?php

namespace App\Http\Controllers\Frontend\Modules\MyLead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManageLead;
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

 	ManageLead::where('id',$request->lead_id)->update(['application_status'=>$request->status]);
 	return back()->with('siccess','Status changed');
 }
}
