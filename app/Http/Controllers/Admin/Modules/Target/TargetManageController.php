<?php

namespace App\Http\Controllers\Admin\Modules\Target;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Target;
use App\User;

class TargetManageController extends Controller
{
    
    /**
     *   Method      : taregetList
     *   Description : Taget Listing view
     *   Author      : Sayan
     **/

    public function taregetList()
    {
    	 $data = [];
    	 $data['targets'] = Target::orderBy('id','desc')->where('status','A')->get();
          $data['users']=User::where('status','!=','D')->get(); 	
    	 return view('admin.modules.target.target_list',$data);
    }







    /**
     *   Method      : addView
     *   Description : Taget Add View
     *   Author      : Sayan
     **/

    public function addView()
    {
    	return view('admin.modules.target.target_add');
    }







    /**
     *   Method      : insertTarget
     *   Description : Taget added functionality
     *   Author      : Sayan
     **/

    public function insertTarget(Request $request)
    {
    	$request->validate([
            'year' => 'required',
            'month' => 'required',
            'salary' => 'required',
            'from' => 'required',
            'to'=>'required',            
        ]);
        $check = Target::where('status','!=','D')->where('year',$request->year)->where('month',$request->month)->where('from_target','<=',$request->from)->where('to_target','>=',$request->from)->first();
        $check2 = Target::where('status','!=','D')->where('year',$request->year)->where('month',$request->month)->where('from_target','<=',$request->to)->where('to_target','>=',$request->to)->first();
        $check3 = Target::where('status','!=','D')->where('year',$request->year)->where('month',$request->month)->where('from_target','<=',$request->to)->where('from_target','>=',$request->from)->where('to_target','<=',$request->to)->first();

         $check4 = Target::where('status','!=','D')->where('year',$request->year)->where('month',$request->month)->where('from_target','<',$request->from)->where('to_target','>',$request->to)->first();


        if (@$check!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        if (@$check2!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        if (@$check3!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
         if (@$check4!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        $target = new Target;
        $target->year = $request->year;
        $target->month = $request->month;
        $target->salary = $request->salary;
        $target->from_target= $request->from;
        $target->to_target = $request->to;
        
        $target->save();
        return redirect()->back()->with('success','Target Added Suucssfully');
    }










    public function getMonth(Request $request)
    {
     	if (date('Y')==$request->year) {
    		return view('admin.modules.target.target_year_one');
		}
        else{
    		return view('admin.modules.target.target_year_two');
    	}
		
	}








    public function delTarget($id)
    {
        $check = Target::where('id',$id)->where('status','!=','D')->first();
        if ($check==null) {
             return redirect()->back();
        }
        $delete = Target::where('id',$id)->update(['status'=>'D']);
        return redirect()->back()->with('success','Target Deleted Successfully');
    }









    public function editTargetView($id)
    {
        $data = Target::where('id',$id)->where('status','!=','D')->first();
        if ($data==null) {
             return redirect()->back();
        }
        return view('admin.modules.target.target_edit',compact('data'));
    }








    public function updateTraget(Request $request)
    {
        $check = Target::where('status','!=','D')->where('year',$request->year)->where('id','!=',$request->id)->where('month',$request->month)->where('from_target','<=',$request->from)->where('to_target','>=',$request->from)->first();
        $check2 = Target::where('status','!=','D')->where('year',$request->year)->where('id','!=',$request->id)->where('month',$request->month)->where('from_target','<=',$request->to)->where('to_target','>=',$request->to)->first();
         $check3 = Target::where('status','!=','D')->where('year',$request->year)->where('id','!=',$request->id)->where('month',$request->month)->where('from_target','<=',$request->to)->where('from_target','>=',$request->from)->where('to_target','<=',$request->to)->first();

          $check4 = Target::where('status','!=','D')->where('year',$request->year)->where('id','!=',$request->id)->where('month',$request->month)->where('from_target','<',$request->from)->where('to_target','>',$request->to)->first();

        if (@$check!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        if (@$check2!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        if (@$check3!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
         if (@$check4!="") {
            return redirect()->back()->with('error','This Target Already Exits In This Month');
        }
        
        $request->validate([
            'year' => 'required',
            'month' => 'required',
            'salary' => 'required',
            'from' => 'required',
            'to'=>'required',            
        ]);

        $upd = [];
        $upd['year'] = $request->year;
        $upd['month'] = $request->month;
        $upd['salary'] = $request->salary;
        $upd['from_target'] = $request->from;
        $upd['to_target'] = $request->to;
        $update = Target::where('id',$request->id)->update($upd);
        return redirect()->back()->with('success','Target Updated Successfully');


    }







    public function assing(Request $request){
        dd($request->all());
    }

}
