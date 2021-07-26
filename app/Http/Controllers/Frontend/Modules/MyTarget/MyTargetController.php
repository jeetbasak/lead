<?php

namespace App\Http\Controllers\Frontend\Modules\MyTarget;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManageLead;
use App\Models\Target;
use App\Models\UserToTarget;
use Auth;
use App\User;

class MyTargetController extends Controller
{
 

 public function target_list(Request $request){
 	$userId=Auth::user()->id;
 	//dd(date('Y')+1-1);
 	$data['targets']=UserToTarget::where('user_id',$userId)->where('target_month',date('m')+1-1)->where('target_year',date('Y')+1-1)->with('targett')->get();
 	return view('frontend.modules.my_target.my_target')->with($data);
 }




  public function future_target_list(Request $request){
 	$userId=Auth::user()->id;
 	//dd($userId);
 	$data['targets']=UserToTarget::where('user_id',$userId)->where('target_month','>',date('m')+1-1)->where('target_year',date('Y')+1-1)->orWhere('target_year','>',date('Y')+1-1)->where('user_id',$userId)->with('targett')->get();
 	return view('frontend.modules.my_target.future_target')->with($data);
 }




  public function past_target_list(Request $request){
 	$userId=Auth::user()->id;
 	//dd($userId);
 	$data['targets']=UserToTarget::where('user_id',$userId)->where('target_month','<',date('m')+1-1)->where('target_year',date('Y')+1-1)->orWhere('target_year','<',date('Y')+1-1)->where('user_id',$userId)->with('targett')->get();
 	return view('frontend.modules.my_target.past_target')->with($data);
 }




}
