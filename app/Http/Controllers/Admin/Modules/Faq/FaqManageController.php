<?php

namespace App\Http\Controllers\Admin\Modules\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\User;

class FaqManageController extends Controller
{


	public function faq_list(Request $request){
		$data['faq']=Faq::where('status','!=','D')->get();
		return view('admin.modules.faq.faq')->with($data);
	}





	public function add_form(){
		return view('admin.modules.faq.faq_add');
	}




	public function insert_faq(Request $request){
		if($request->all()){
			$faq=new Faq();

			$faq->question= $request->qus;
			$faq->answer=$request->ans;

			$faq->save();
			return back()->with('success','Faq has been added successfully..!');
		}
	}





	public function update(Request $request){
		//dd($request->all());
		$w=array(
			'question'=>$request->qus,
			'answer'=>$request->ans,
			'status'=>$request->status,
		);

		Faq::where('id',$request->faq_id)->update($w);
		return back()->with('success','Faq no '. $request->faq_id.' has been updated');
	}




	public function dlt($id){
		//dd($request->all());
		$w=array(
			'status'=>'D',			
		);

		Faq::where('id',$id)->update($w);
		return back()->with('success','Faq no '. $id.' has been Deleted');
	}
    
}
