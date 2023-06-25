<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\Facades\Image;

class HomeSlideController extends Controller
{
    public function homeslider(){

        $homeslide=HomeSlide::find(1);

        return view('home.home_slide',['homeslide'=>$homeslide]);
    }
    public function homeslider_update(Request $request){

        $home_id= $request->id;
        
        if ($request->file('home_image')){

             $image= time().'.'.$request->home_image->extension(); 
             $getfile=$request->file('home_image');
            $destination='homeslideimg/';
            if(!file_exists($destination)){
                 mkdir($destination,0777,true);
             }
            Image::make($getfile)->resize(636,852)->save(public_path($destination.$image));

            $homeslide=HomeSlide::find($home_id);

            $homeslide['tittle']=$request['tittle'];
            $homeslide['short_tittle']=$request['short_tittle']; 
            $homeslide['home_image']=$image;
            $homeslide['vedio_url']=$request['vedio_url'];
            $homeslide->save();
            $notification = array(

                'message' => 'home slider  updated  with image sucesssfullly!!',
                'alert-type'=> 'success'
               );
 
         return redirect()->back()->with($notification);
            

        }

        else{

            $homeslide=HomeSlide::find($home_id);

            $homeslide['tittle']=$request['tittle'];
            $homeslide['short_tittle']=$request['short_tittle']; 
            $homeslide['vedio_url']=$request['vedio_url'];
            $homeslide->save();
            $notification = array(

                'message' => 'home slider  updated  without image sucesssfullly!!',
                'alert-type'=> 'success'
               );
 
         return redirect()->back()->with($notification);
            

        }
        
       
       

  }
} 


