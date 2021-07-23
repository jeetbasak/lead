<?php

namespace App\Http\Controllers\Admin\Modules\Lead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManageLead;

class LeadController extends Controller
{


    public function lead_list(Request $request){
       $data['leads']=ManageLead::get();
       return view('admin.modules.lead.lead_list')->with($data);
    }



    public function lead_add_form(Request $request){
       return view('admin.modules.lead.lead_add');
    }




    public function lead_insert(Request $request){
    	$request->validate([
            'name' => 'required|min:3',
            'address' => 'required',
            'ph' => 'required|min:10',
            'email' => 'required|min:3'            
        ]);

        $lead_ins=new ManageLead();
        $lead_ins->user_name=$request->name;      
        $lead_ins->user_email=$request->email;
        $lead_ins->ph=$request->ph;
        $lead_ins->user_address=$request->address;
        $lead_ins->application_date=date('Y-m-d H:i:s');
       
        $lead_ins->save();
       return back()->with('success','The lead added successfully..!');
    }

}
