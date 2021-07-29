<?php

namespace App\Http\Controllers\Frontend\Modules\Tutorial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Target;
use App\User;
use App\Models\Tutorial;

class MyTutorialController extends Controller
{
    public function list(Request $request){
    	$data['tutorial']=Tutorial::where('status','A')->get();
    	return view('frontend.modules.tutorial.my_tutorial')->with($data);
    }
}
