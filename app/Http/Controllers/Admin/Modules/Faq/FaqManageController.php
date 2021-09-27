<?php

namespace App\Http\Controllers\Admin\Modules\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Picture;
use App\Models\Banner;
use App\User;


class FaqManageController extends Controller
{


	public function faq_list(Request $request){
		$data['faq']=Faq::where('status','!=','D')->get();
		return view('admin.modules.faq.faq')->with($data);
	}





	public function add_form(){
		return view('admin.modules.faq.faq_add');
	}




	public function insert_faq(Request $request){
		if($request->all()){
			$faq=new Faq();

			$faq->question= $request->qus;
			$faq->answer=$request->ans;

			$faq->save();
			return back()->with('success','Faq has been added successfully..!');
		}
	}





	public function update(Request $request){
		//dd($request->all());
		$w=array(
			'question'=>$request->qus,
			'answer'=>$request->ans,
			'status'=>$request->status,
		);

		Faq::where('id',$request->faq_id)->update($w);
		return back()->with('success','Faq no '. $request->faq_id.' has been updated');
	}




	public function dlt($id){
		//dd($request->all());
		$w=array(
			'status'=>'D',			
		);

		Faq::where('id',$id)->update($w);
		return back()->with('success','Faq no '. $id.' has been Deleted');
	}





//-------------------------------PICTURE IN LANDING PAGE------------------------//

	public function picture_list(Request $request){   
       $data['pics']=Picture::where('status','A')->get();
       return view('admin.modules.picture.pic_list')->with($data);
	}




	public function pic_add_form(Request $request){
        return view('admin.modules.picture.pic_add');
	}



	public function insert_pic(Request $request){
		 if ($request->hasFile('pic')){

		 	$chk=Picture::where('status','A')->count();
		 	if($chk>4){
		 		return back()->with('error','You already have 4 active image');
		 	}
		 	//dd($request->all());
            //this is for unlink the image
            // $unlnk=User::where('id',auth()->user()->id)->first();
            // @$prev_img = $unlnk->image;
           
            // if(@$prev_img){               
            //     @unlink('storage/app/public/profile/'.$prev_img);
            // }

            //this is for upload image
            $image = $request->pic;
            $pic = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/pic",$pic);
           
             $pic_ins=new Picture();

			$pic_ins->title= $request->title;
			$pic_ins->image=$pic;

			$pic_ins->save();
			return back()->with('success','picture has been added successfully..!');

        }
	}






	public function pic_dlt($id){
		$w=array(
			'status'=>'D',			
		);

		Picture::where('id',$id)->update($w);
		return back()->with('success','Picture no '. $id.' has been Deleted');
	}





	//---------------------BANNER PART---------------------------//

	public function banner_list(Request $request){   
       $data['banner']=Banner::where('status','!=','D')->get();
       return view('admin.modules.banner.banner_list')->with($data);
	}



	public function banner_add_form(){
		  return view('admin.modules.banner.banner_add');
	}




	public function insert_banner(Request $request){
		 if ($request->hasFile('pic')){

		 	//chk
		 	$title_chk=Banner::where('title',$request->title)->where('status','!=','D')->count();
		 	if($title_chk>0){
		 		return back()->with('error','This title already exists..!');
		 	}



            //this is for upload image
            $image = $request->pic;
            $pic = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/banner",$pic);
           
             $pic_ins=new Banner();



			$pic_ins->title= $request->title;
			$pic_ins->image=$pic;

			$pic_ins->save();
			return back()->with('success','Banner has been added successfully..!');

        }
	}




	public function banner_dlt($id){     
     $w=array(
			'status'=>'D',			
		);

		Banner::where('id',$id)->update($w);
		return back()->with('success','Banner no '. $id.' has been Deleted');
	}



	public function banner_active($id){
		//dd($id);

		$chk=Banner::where('status','A')->first();
		if($chk){
			$upd=Banner::where('id',$chk->id)->update(['status'=>'I']);
			$upd2=Banner::where('id',$id)->update(['status'=>'A']);
			return back()->with('success','Banner activated');
		}else{
			$upd2=Banner::where('id',$id)->update(['status'=>'A']);
			return back()->with('success','Banner activated');
		}
	}

    
}
