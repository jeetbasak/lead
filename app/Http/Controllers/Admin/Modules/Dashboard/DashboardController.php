<?php

namespace App\Http\Controllers\Admin\Modules\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use App\User;
use App\Models\Notification;
use App\Models\Salary;
class DashboardController extends Controller
{
   /**
     *   Method      : dashboard
     *   Description : For admin dashboard page
     *   Author      : Jeet
     *   
     **/

    public function dashboard(Request $request){
    	return view('admin.modules.dashboard.dashboard');
    }

    public function exportUser(Request $request)
    {
    $abc= User::whereIn('status',['A','AA','I'])->orderBy('id','desc')->get();
    // dd($abc);
    $data = '';
    
      $data .='<table>
      <tr>
      <th style="border:1px solid black;">Name</th>
      <th style="border:1px solid black;">Email</th>
      <th style="border:1px solid black;">Phone Number</th>
      <th style="border:1px solid black;">Last Qualification</th>
      <th style="border:1px solid black;">Country Name</th>
      <th style="border:1px solid black;">State Name</th>
      <th style="border:1px solid black;">City Name</th>
      <th style="border:1px solid black;">Pincode</th>
      <th style="border:1px solid black;">Address</th>
      <th style="border:1px solid black;">Work Experience</th>
      <th style="border:1px solid black;">Laptop Access</th>
      <th style="border:1px solid black;">Company Phone Number</th>
      </tr>
      ';
      foreach (@$abc as $value) {
        // status 
        if ($value->user_status=="A") {
          $status = "Active";
        }elseif ($value->user_status=="I") {
          $status = "Inactive";
        }elseif ($value->user_status=="AA"){
           $status = "Awaiting Approval";
        }
        // laptop-access 
        if ($value->laptop_access=="Y") {
          $laptop_access = "Yes";
        }else{
          $laptop_access = "No";
        }

        // work-experience
        if ($value->work_exp=="Y") {
          $work = "Yes";
        }else{
          $work = "No";
        }
       	


        $data .= '
        <tr>
         <td style="border:1px solid black;">'.@$value->name.'</td>
        <td style="border:1px solid black;">'.@$value->email.'</td>
        <td style="border:1px solid black;">'.@$value->ph.'</td>
        <td style="border:1px solid black;">'.@$value->last_qualification.'</td>
        <td style="border:1px solid black;">'.@$value->country_user->name.'</td>
        <td style="border:1px solid black;">'.@$value->state_user->name.'</td>
        <td style="border:1px solid black;">'.@$value->city_name.'</td>
        <td style="border:1px solid black;">'.@$value->pin_code.'</td>
        <td style="border:1px solid black;">'.@$value->address.'</td>
        <td style="border:1px solid black;">'.@$work.'</td>
        <td style="border:1px solid black;">'.@$laptop_access.'</td>
        <td style="border:1px solid black;">'.@$value->company_ph.'</td>
        </tr>';
      }
      $data .= '</table>';
      header("Content-Type: application/xls");    
	  header("Content-Disposition: attachment; filename=UsersReport.xls");  
	  header("Pragma: no-cache"); 
	  header("Expires: 0");
	  echo $data;
    }


    public function exportSalary(Request $request)
    {
    $abc= Salary::with('userr')->get();
    // dd($abc);
    $data = '';
    
      $data .='<table>
      <tr>
      <th style="border:1px solid black;">Name</th>
      <th style="border:1px solid black;">Email</th>
      <th style="border:1px solid black;">Phone Number</th>
      <th style="border:1px solid black;">Month</th>
      <th style="border:1px solid black;">Year</th>
      <th style="border:1px solid black;">Target Achive</th>
      <th style="border:1px solid black;">Salary</th>
      </tr>
      ';
      foreach (@$abc as $value) {
        // status 
        if (@$value->month_id=='1') {
          $month="January";
        }elseif (@$value->month_id=='2') {
          $month="February";
        }
        elseif (@$value->month_id=='3') {
          $month="March";
        }
        elseif (@$value->month_id=='4') {
          $month="April";
        }
        elseif (@$value->month_id=='5') {
          $month="May";
        }
        elseif (@$value->month_id=='6') {
          $month="June";
        }
        elseif (@$value->month_id=='7') {
          $month="July";
        }
        elseif (@$value->month_id=='8') {
          $month="August";
        }
        elseif (@$value->month_id=='9') {
          $month="September";
        }
        elseif (@$value->month_id=='10') {
          $month="October";
        }
        elseif (@$value->month_id=='11') {
          $month="November";
        }else{
          $month="December";
        }
       
         $data .= '
        <tr>
         <td style="border:1px solid black;">'.@$value->userr->name.'</td>
        <td style="border:1px solid black;">'.@$value->userr->email.'</td>
        <td style="border:1px solid black;">'.@$value->userr->ph.'</td>
        <td style="border:1px solid black;">'.@$month.'</td>
        <td style="border:1px solid black;">'.@$value->year.'</td>
        <td style="border:1px solid black;">'.@$value->target_achive.'</td>
        <td style="border:1px solid black;">'.@$value->salary.'</td>
        </tr>';
      }
      $data .= '</table>';
      header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=SalaryReport.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    echo $data;
    }
    

    public function showReport()
    {
      return view('admin.modules.report.manage_report');
    }








    /**
 *   Method      : change_password_page
 *   Description : For admin change_password_page 
 *   Author      : Jeet
 **/

    public function admin_change_password_page(Request $request){
     return view('admin.modules.dashboard.change_pass');
    }




    public function update(Request $request){
        //dd($request->all());
        $request->validate([
           'old_password'        => 'required|string|min:6',
           'newPassword'=> 'required|min:6|required_with:confirm|same:confirm',
           'confirm'=>'required|min:6', 
         ]);
        //dd(Auth::guard('admin')->id());
        $oldpassword = $request->input('old_password');
        if (!\Hash::check($oldpassword,Auth::guard('admin')->user()->password)) {
            return redirect()->back()->with('error','You have entered wrong old password!');
        }else{
            $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                'password'=>\Hash::make($request->input('newPassword'))
            ]);
            return redirect()->back()->with('success','Password updated successfully!');
        }
    }






    public function offer_list(Request $request){
      $data['users']=User::where('status','A')->get();
      return view('admin.modules.dashboard.offer_latter')->with($data);
    }


    public function offer_add(Request $request){
     // dd($request->all());
      
       if ($request->offer){
     

          //this is for upload offer latter
          $image = $request->offer;
          $profile = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("public/storage/offerlatter",$profile);
          User::where('id',$request->user_id)->update(['offer_latter'=>$profile]);

          //notification sent code to user
            @$u=User::where('id',$request->user_id)->first();
            $notification=new Notification();

            $notification->user_type='U';
            $notification->user_id=@$request->user_id;
            $notification->not_type='Offer latter';
            $notification->message='Admin has sent your offer latter.!';

            $notification->save(); 

          return redirect()->back()->with('success','Offer latter added successfully!');
      }
    }



    public function offer_del($id){

     $unlnk=User::where('id',$id)->first();
            @$prev_img = $unlnk->offer_latter;
           
            if(@$prev_img){               
                @unlink('public/storage/offerlatter/'.$prev_img);
            }
      $upd=User::where('id',$id)->update(['offer_latter'=>null]);
      return redirect()->back()->with('success','Offer latter deleted successfully!');
      
    }
   

}
