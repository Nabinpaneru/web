<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
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

   
}
