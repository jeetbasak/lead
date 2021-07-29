<?php

namespace App\Http\Controllers\Admin\Modules\Tutorial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Target;
use App\User;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function list(Request $request){
    	$data['tutorials']=Tutorial::where('status','A')->get();
    	return view('admin.modules.tutorial.tutorial_list')->with($data);
    }


    public function add_form(){
    	return view('admin.modules.tutorial.tutorial_add');
    }


        public function insert(Request $request){
        	//dd($request->all());
        	$request->validate([
            'title' => 'required',
            'video' => 'required'            
        ]);

    	$chk=Tutorial::where('title',$request->title)->count();
		if($chk>0){
			return back()->with('error','Title already exists');
		}

        @$video_id1 = explode("embed/", $request->video);
        @$video_id2 = explode('"', $video_id1[1]);
        @$thumbnail="http://img.youtube.com/vi/".$video_id2[0]."/mqdefault.jpg";

        $tutorial_ins=new Tutorial();
        $tutorial_ins->title=$request->title;      
        $tutorial_ins->video=$request->video;
        $tutorial_ins->short_url=$video_id2[0];
        $tutorial_ins->thumbnil=@$thumbnail;
        //$tutorial_ins->video=$request->video;
        
        $tutorial_ins->save();
    	return back()->with('success','Added');
    	}






    public function delete($id){
     $data['tutorial']=Tutorial::where('id',$id)->update(['status'=>'D']);
     	return back()->with('success','Tutorial deletet');
    }






    public function edit_view($id){
    	$data['tutorial']=Tutorial::where('id',$id)->first();
     return view('admin.modules.tutorial.edit_tutorial')->with($data);
    }








    public function update(Request $request){
    		$request->validate([
            'title' => 'required',
            'video' => 'required'            
        ]);

    		$chk=Tutorial::where('title',$request->title)->where('id','!=',$request->id)->count();
    		if($chk>0){
    			return back()->with('error','Title already exists');
    		}

    	@$video_id1 = explode("embed/", $request->video);
        @$video_id2 = explode('"', $video_id1[1]);
        @$thumbnail="http://img.youtube.com/vi/".$video_id2[0]."/mqdefault.jpg";

    		$upd=array(
    			'title'=>$request->title,
    			'video'=>$request->video,
    			'short_url'=>$video_id2[0],
                'thumbnil'=>@$thumbnail
    		);

    		Tutorial::where('id',$request->id)->update($upd);
    		return back()->with('success','Updated');
    }


     
    public function view($id){
    	$data['tutorial']=Tutorial::where('id',$id)->first();
     return view('admin.modules.tutorial.tutorial_view')->with($data);
    }

    
}
