<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message' => 'Admin logout sucesssfullly!!',
            'alert-type'=> 'info'
        );

        return redirect('/login')->with($notification);
    }

    public function profile(){

        $id=Auth::user()->id;
        $admin=User::find($id);
    //    dd($admin);

        return view('admin.profile.index',['admin' =>$admin]);

    
    }
    public function edit(){

        // $id=Auth::User();
        $admin=User::find(Auth::user()->id); 
        // dd($admin);
         return view('admin.profile.edit',['admin' =>$admin]);

    
    }
    public function update(Request $request){

        
        $admin=User::find(Auth::user()->id); 
        
    

        if($request->image){

            $imageName= time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('images'), $imageName);
            $admin['image'] = $imageName;
        }
            $admin['name']=$request['name'];
            $admin['email']=$request['email'];

            $admin->save();

             $notification = array(

               'message' => 'Profile updated sucesssfullly!!',
                'alert-type'=> 'success'
              );

        return redirect()->route('admin.profile')->with($notification);

     }
    public function password(){

        return view('admin.profile.password');

    }
    public function update_password(Request $request){

        $request->validate([
            'password'=> 'required',
            'new_password'=> 'required',
            'confirm_password'=>'required | same:new_password',

        ]);
        $hashed=Auth::user()->password;
        if (Hash::check($request->password,$hashed)) {

            $admin=User::find(Auth::user()->id); 
            $admin['password']= bcrypt($request['new_password']);
            $admin->save();
            return redirect()->back()->with('error','Password change sucessfully!!');
        }
        else{

            return redirect()->back()->with('message','Password doesnot matched');




        }
       

    
       
    
    }
    
    
    

   
}
