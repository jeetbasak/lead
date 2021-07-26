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
        $check = User::where('id','!=',$request->id)->where('ph',$request->number)->where('status','!=','D')->first();
        if ($check!="") {
          return redirect()->back()->with('error','Email Already Exists.Try Another');
        }
        $upd = [];
        $upd['name'] = $request->name;
        $upd['email'] = $request->email;
        $upd['ph'] = $request->number;
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

    public function changeStatus($id)
    {
      // return $id;
       $data = User::where('id',$id)->where('status','!=','D')->first();
       if ($data==null) {
            return redirect()->back();
       }
       if ($data->status=="AA") {
         $update =  User::where('id',$id)->where('status','!=','D')->update(['status'=>'A']);
         return redirect()->back()->with('success','User Activated Successfully');
       }
        if ($data->status=="A") {
         $update =  User::where('id',$id)->where('status','!=','D')->update(['status'=>'I']);
         return redirect()->back()->with('success','User Deactivated Successfully');
       }
       if ($data->status=="I") {
         $update =  User::where('id',$id)->where('status','!=','D')->update(['status'=>'A']);
         return redirect()->back()->with('success','User Activated Successfully');
    }
   }


   public function viewUser($id)
   {
    $data = User::where('id',$id)->where('status','!=','D')->first();
    if ($data==null) {
            return redirect()->back();
    }
    return view('admin.modules.user.view_user',compact('data'));
   }
}