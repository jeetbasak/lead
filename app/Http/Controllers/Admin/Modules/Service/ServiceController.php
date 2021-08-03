<?php

namespace App\Http\Controllers\Admin\Modules\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Service;

class ServiceController extends Controller
{
    public function service_list(Request $request){
    	$data['service']=Service::where('status','!=','D')->get();
    	 return view('admin.modules.service.service',$data);
    }


    public function ServiceController(){
    	return view('admin.modules.service.add_service');
    }



    public function insert_ser(Request $request){

    	$srch=Service::where('name',$request->name)->count();
    	if($srch>0){
    		return back()->with('error','Service name already exists');
    	}else{
    		$ser=new Service();
    		$ser->name=$request->name;
    		$ser->save();
    		return back()->with('success','Service name added successfully');
    	}
    }



    public function ser_dlt($id){
    	$dlt=Service::where('id',$id)->update(['status'=>'D']);
    	return back()->with('success','Service deleted successfully');

    }
}
