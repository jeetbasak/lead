<?php

namespace App\Http\Controllers\Frontend\Modules\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;


class FaqController extends Controller
{
    

    public function faq_list(Request $request){
		$data['faq']=Faq::where('status','A')->get();
		return view('frontend.modules.faq.faq')->with($data);
	}


	public function tc(Request $request){
		//$data['faq']=Faq::where('status','A')->get();
		return view('frontend.modules.faq.tc');
	}
}
