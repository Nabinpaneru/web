<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function aboutpage(){

        $aboutpage=About::find(1);
        return view('home.about_page',['aboutpage'=>$aboutpage]);
    }

    public function about_update(Request $request){

        $about_id= $request->id;
        
        if ($request->file('about_image')){

             $image= time().'.'.$request->about_image->extension(); 
             $getfile=$request->file('about_image');
            $destination='aboutpageimg/';
            if(!file_exists($destination)){
                 mkdir($destination,0777,true);
             }
            Image::make($getfile)->resize(636,852)->save(public_path($destination.$image));

            $aboutpage=About::find($about_id);

            $aboutpage['tittle']=$request['tittle'];
            $aboutpage['short_tittle']=$request['short_tittle']; 
            $aboutpage['about_image']=$image;
            $aboutpage['short_description']=$request['short_description'];
            $aboutpage['long_description']=$request['long_description'];
            $aboutpage->save();
            $notification = array(

                'message' => 'About page  updated  with image sucesssfullly!!',
                'alert-type'=> 'success'
               );
 
         return redirect()->back()->with($notification);
            

        }

        else{

            $aboutpage=About::find($about_id);

            $aboutpage['tittle']=$request['tittle'];
            $aboutpage['short_tittle']=$request['short_tittle']; 
            $aboutpage['short_description']=$request['short_description'];
            $aboutpage['long_description']=$request['long_description'];
            $aboutpage->save();
            $notification = array(

                'message' => 'about page  updated  without image sucesssfullly!!',
                'alert-type'=> 'success'
               );
 
         return redirect()->back()->with($notification);
            

        }

       
       
        }

        public function aboutheader(){

            $aboutpage=About::find(1);
            return view('home.aboutheader',['aboutpage'=>$aboutpage]);
        }
        


}
