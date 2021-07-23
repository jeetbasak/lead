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

}
