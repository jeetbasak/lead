<?php

namespace App\Http\Controllers\Admin\Modules\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;

class DashboardController extends Controller
{
   /**
     *   Method      : dashboard
     *   Description : For admin dashboard page
     *   Author      : Jeet
     *   
     **/

    public function dashboard(Request $request){
    	return view('admin.modules.dashboard.dashboard');
    }

}
