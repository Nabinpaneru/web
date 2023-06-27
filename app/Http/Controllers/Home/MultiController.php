<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MUltiImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class MultiController extends Controller
{
    public function multi(){

      

        return view('home.multi');
     }



    public function multi_save(Request $request){

        $request->validate([
          'multi_image' => 'required',
          'multi_image.*' => 'required|mimes:jpeg,png,jpg,gif,svg', ]);
    
        $images = $request->multi_image;
  
  
    foreach($images as $image){
  
  
     $saveimage= uniqid().'.'.$image->extension();

     Image::make($image)->resize(220,220)->save(public_path('multi/'.$saveimage));
     $image=New MUltiImage;
  
     $image['multi_image']=$saveimage;
     $image->created_at=Carbon::now();
     $image->save();
     }
     $notification = array(

        'message' => 'Image save sucesssfullly!!',
        'alert-type'=> 'success'
       );

 return redirect()->back()->with($notification);
    

}


public function all_image(){


    $images=MUltiImage::paginate(3);
   
    return view('home.all_image',compact('images'));
 }

 public function multi_edit($id){
    $image=MUltiImage::find($id);
    
    return view('home.editmulti',compact('image'));
 
}

public function multi_update(Request $request ,$id){

    $image=MUltiImage::find($id);
   
    $request->validate([
        
        'multi_image' => 'required|mimes:jpeg,png,jpg,gif,svg', 
    ]);

    $saveimage= time().'.'.$request->multi_image->extension();
    $file=$request->multi_image;


    Image::make($file)->resize(220,220)->save(public_path('multi/'.$saveimage));
 
    $image['multi_image']=$saveimage;
   
    $image->save();
    $notification = array(

        'message' => 'Image updated sucesssfullly!!',
        'alert-type'=> 'success'
       );
 
      return redirect()->route('All.image')->with($notification);
     
    }

    public function multi_delete($id){


        $image=MUltiImage::find($id);
        $old_image=$image->multi_image;
        unlink(public_path('multi/').$old_image);
        
        $image->delete();
        $notification = array(

            'message' => 'Image delete sucesssfullly!!',
            'alert-type'=> 'success'
           );
     
          return redirect()->back()->with($notification);

    }
   
   
    

    

    
    

 
}


