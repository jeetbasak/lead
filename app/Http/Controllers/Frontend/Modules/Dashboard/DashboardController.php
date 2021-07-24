<?php

namespace App\Http\Controllers\Frontend\Modules\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home(){
    	 return view('frontend.modules.dashboard.dashboard');
    }
}
