<?php

namespace App\Http\Controllers\Admin\Modules\ManageUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Country;
use App\Models\State;
class ManageUserController extends Controller
{
    //
    public function userList()
    {
      $data = [];
      $data['users'] = User::whereIn('status',['A','AA','I'])->orderBy('id','desc')->get();
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
       $data = [];
       $data['data'] = User::where('id',$id)->where('status','!=','D')->first();
       $data['country'] =Country::get();
       $data['state'] =State::where('country_id',$data['data']->country_id)->get();

       if ($data==null) {
            return redirect()->back();
       }
       return view('admin.modules.user.edit_user',$data);
         
    }

    public function updateUser(Request $request)
    {
        $check = User::where('id','!=',$request->id)->where('ph',$request->number)->where('status','!=','D')->first();
        if ($check!="") {
          return redirect()->back()->with('error','Email Already Exists.Try Another');
        }
        $upd = [];
       $upd['name'] = $request->name;
     
      $upd['ph'] = $request->ph;
      $upd['address'] = $request->address;
      $upd['city_name'] = $request->city;
      $upd['pin_code'] = $request->pin_code;
      $upd['work_exp'] = $request->work_exp;
      $upd['country_id'] = $request->country;
      $upd['state_id'] = $request->state;
      $upd['last_qualification'] = $request->qualification;
      $upd['company_ph'] = $request->company_ph;
      $upd['laptop_access'] = $request->laptop;

              if ($request->hasFile('profile')){
            //this is for unlink the image
            $unlnk=User::where('id',@$request->id)->first();
            @$prev_img = $unlnk->image;
           
            if(@$prev_img){               
                @unlink('storage/app/public/profile/'.$prev_img);
            }

            //this is for upload image
            $image = $request->profile;
            $profile = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/profile",$profile);
            $upd['image'] = $profile;
        }

        if ($request->hasFile('adhar')){
            //this is for unlink the image
            $unlnk=User::where('id',@$request->id)->first();
            @$prev_img = $unlnk->adher;
           
            if(@$prev_img){               
                @unlink('storage/app/public/adhar/'.$prev_img);
            }

            //this is for upload image
            $image = $request->adhar;
            $profile = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/adhar",$profile);
            $upd['adher'] = $profile;
        }


         if ($request->hasFile('pan')){
            //this is for unlink the image
            $unlnk=User::where('id',@$request->id)->first();
            @$prev_img = $unlnk->pan;
           
            if(@$prev_img){               
                @unlink('storage/app/public/pan/'.$prev_img);
            }

            //this is for upload image
            $image = $request->pan;
            $profile = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/pan",$profile);
            $upd['pan'] = $profile;
        }
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