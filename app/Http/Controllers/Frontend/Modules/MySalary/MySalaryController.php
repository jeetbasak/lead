<?php

namespace App\Http\Controllers\Frontend\Modules\MySalary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Target;
use App\Models\UserToTarget;
use Auth;

class MySalaryController extends Controller
{
    
    public function my_salary_list(Request $request){

      $data['salary']=Salary::where('user_id',Auth()->user()->id)->orderBy('id','desc')->get();
      return view('frontend.modules.salary.salary')->with($data);
    }
}
