<?php

namespace App\Http\Controllers\Frontend\Modules\MyProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Country;
use App\Models\State;
class MyProfileController extends Controller
{
    //
    public function index()
    {
    	$data = [];
    	$data['country'] = Country::get();
    	$data['state'] = State::where('country_id',auth()->user()->country_id)->get();
    	return view('frontend.modules.profile.profile',$data);
    }

    public function updateProfile(Request $request)
    {
    	$upd = [];
    	$upd['name'] = $request->name;
    	$upd['email'] = $request->email;
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
            $unlnk=User::where('id',auth()->user()->id)->first();
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
            $unlnk=User::where('id',auth()->user()->id)->first();
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
            $unlnk=User::where('id',auth()->user()->id)->first();
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

    	$update = User::where('id',auth()->user()->id)->update($upd);
    	return redirect()->back()->with('success','Profile updated successfully');
    }
}
