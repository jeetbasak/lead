<?php

namespace App\Http\Controllers\Admin\Modules\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    
 /**
 *   Method      : dashboard
 *   Description : For admin notification page
 *   Author      : Jeet
 **/

    public function notification_list(Request $request){
    	return view('admin.modules.notification.notification_list');
    }
}
