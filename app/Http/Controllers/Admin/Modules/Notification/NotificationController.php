<?php

namespace App\Http\Controllers\Admin\Modules\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    
 /**
 *   Method      : notification_list
 *   Description : For admin notification page
 *   Author      : Jeet
 **/

    public function notification_list(Request $request){

    	$chk2=Notification::where('is_read','UR2')->where('user_type','A')->get();
    	if(count($chk2)>0){
    		foreach($chk2 as $val){
    			$upd=array(
                    'is_read'=>'R'
    			);
    			Notification::where('id',$val->id)->update($upd);
    		}
    	}


    	$chk1=Notification::where('is_read','UR1')->where('user_type','A')->get();
    	if(count($chk1)>0){
    		foreach($chk1 as $val){
    			$upd=array(
                    'is_read'=>'UR2'
    			);
    			Notification::where('id',$val->id)->where('user_type','A')->update($upd);
    		}
    	}

    

    	$data['notification']=Notification::orderBy('id','desc')->where('user_type','A')->get();
    	return view('admin.modules.notification.notification_list')->with($data);
    }



    public function not_count(Request $request){
        @$noti=Notification::where('is_read','UR1')->where('user_type','A')->count();
        return response()->json(['noti'=>@$noti]);
    }
}
