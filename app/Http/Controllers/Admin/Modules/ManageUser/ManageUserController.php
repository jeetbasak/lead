<?php

namespace App\Http\Controllers\Admin\Modules\ManageUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class ManageUserController extends Controller
{
    //
    public function userList()
    {
      $data = [];
      $data['users'] = User::where('status','!=','D')->get();
      return view('admin.modules.user.user_list',$data);
    }

    public function deleteUser($id)
    {
    	$check = User::where('id',$id)->where('status','!=','D')->first();
    	if ($check==null) {
    		return redirect()->back();
    	}
    	$delete = User::where('id',$id)->where('status','!=','D')->update(['status'=>'D']);
    	return redirect()->back()->with('error','User Deleted Successfully');
    }

    public function editView($id)
    {

       $data = User::where('id',$id)->where('status','!=','D')->first();
       if ($data==null) {
            return redirect()->back();
       }
       return view('admin.modules.user.edit_user',compact('data'));
         
    }

    public function updateUser(Request $request)
    {
        $upd = [];
        $upd['name'] = $request->name;
        $upd['email'] = $request->email;
        $update = User::where('id',$request->id)->update($upd);
        return redirect()->back()->with('success','User Updated Successfully');
    }

    public function checkEmail(Request $request)
    {
        if (@$request->id) {
            $check = User::where('email',$request->email)->where('status','!=','D')->where('id','!=',$request->id)->first();
          if (!empty($check)) {
               echo "false";
          }else{
               echo "true";
          }
        }
    }
}
