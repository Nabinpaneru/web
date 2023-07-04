<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Protfolio;
use Intervention\Image\Facades\Image;

class ProtfolioController extends Controller
{
  public function protfolio_add(){

    return view('home.add_protfolio');
  }

  public function protfolio_save(Request $request){
    
    $request->validate([
        
        'protfolio_name' => 'required', 
        'protfolio_tittle' => 'required', 
    ]);
    $protfolio=new protfolio;
       if($request->protfolio_image){
        $image= time().'.'.$request->protfolio_image->extension();
        $file=$request->protfolio_image;
        Image::make($file)->resize(1020,519)->save(public_path('protfolio/'.$image));
        $protfolio->protfolio_image=$image;
       }
    $protfolio->protfolio_name=$request->protfolio_name;
    $protfolio->protfolio_tittle=$request->protfolio_tittle;
    $protfolio->protfolio_description=$request->protfolio_description;
    $protfolio->save();
    $notification = array(

        'message' => 'Image save sucesssfullly!!',
        'alert-type'=> 'success'
       );

    return redirect()->back()->with($notification);
  }
  public function protfolio_all(){

    $protfolios=Protfolio::paginate(3);

    return view('home.all_protfolio',compact('protfolios'));
  }
  public function protfolio_edit($id){

    $protfolio=Protfolio::find($id);

    return view('home.edit_protfolio',compact('protfolio'));
  }

  public function protfolio_update(Request $request,$id){

    $protfolio=Protfolio::find($id);
    $request->validate([
        'protfolio_name'=> 'required',
        'protfolio_tittle'=> 'required',

    ]);
    if($request->protfolio_image){
        $image= time().'.'.$request->protfolio_image->extension();
        $file=$request->protfolio_image;
        Image::make($file)->resize(1020,519)->save(public_path('protfolio/'.$image));
        $protfolio->protfolio_image=$image;
    }
    $protfolio->protfolio_name=$request->protfolio_name;
    $protfolio->protfolio_tittle=$request->protfolio_tittle;
    $protfolio->protfolio_description=$request->protfolio_description;
    $protfolio->save();
    $notification = array(

        'message' => 'Protfolio updated sucesssfullly!!',
        'alert-type'=> 'success'
       );

    return redirect()->back()->with($notification);
}
   public function protfolio_delete($id){
    $protfolio=Protfolio::find($id);
    $old_image=$protfolio->protfolio_image;
    unlink(public_path('protfolio/').$old_image);
    $protfolio->delete();
    $notification = array(
    'message' => 'protfolio deleted sucesssfullly!!',
    'alert-type'=> 'success'
    );
     
     return redirect()->back()->with($notification);

    
  }

 
}
