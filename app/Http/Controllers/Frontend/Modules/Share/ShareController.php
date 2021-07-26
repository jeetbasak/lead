<?php

namespace App\Http\Controllers\Frontend\Modules\Share;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManageLead;
use App\Models\Target;
use App\Models\UserToTarget;
use Auth;
use App\User;

class ShareController extends Controller
{
    public function share(Request $request){
    	$userId=Auth::user()->id;
 	//dd(date('Y')+1-1);
 	return view('frontend.modules.share.share');
    }
}
