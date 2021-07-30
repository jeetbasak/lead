<?php

namespace App\Http\Controllers\Admin\Modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Target;
use App\Models\UserToTarget;



class SalaryController extends Controller
{
    

    public function list(Request $request){
     
   
      
      $data['salary']=Salary::orderBy('id','desc');
      if(@$request->year){
      	$data['salary']=$data['salary']->where('year',@$request->year);
      }
      if(@$request->month){
      	$data['salary']=$data['salary']->where('month_id',@$request->month);
      }
      $data['salary']=$data['salary']->get();
      
      return view('admin.modules.achivment.user_achivment')->with($data);
        
    }
}
