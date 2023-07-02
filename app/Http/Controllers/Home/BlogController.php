<?php

namespace App\Http\Controllers\Home;
use App\Models\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function add_blog(){
        return view('home.blog.add_blog');
    }

   public function save_blog(Request $request){
        // dd($request->all());
       
        $request->validate([
            'blog_category'=> 'required',

        ]);
        $blog=new BLog;
        $blog->blog_category= $request->blog_category;
        $blog->save();
        $notification = array(

            'message' => 'Blog added sucesssfullly!!',
            'alert-type'=> 'success'
           );

           return redirect()->back()->with($notification);
        
    }
   public function all_blog(){
        $blogs=Blog::paginate(2);
        return view('home.blog.all_blog',compact('blogs'));
    }
   public function edit_blog($id){
        $blog=Blog::find($id);
        return view('home.blog.edit_blog',compact('blog'));
    }
   public function update_blog(Request $request,$id){
        // dd($request->all());
       
        $request->validate([
            'blog_category'=> 'required',

        ]);
        $blog=Blog::find($id);
        $blog->blog_category= $request->blog_category;
        $blog->save();
        $notification = array(

            'message' => 'Blog category updated sucesssfullly!!',
            'alert-type'=> 'success'
           );

           return redirect()->route('all.blog')->with($notification);
        
    }

    public function delete_blog($id){
        $blog=Blog::find($id);
        $blog->delete();
        $notification = array(

            'message' => 'Blog category deleted sucesssfullly!!',
            'alert-type'=> 'success'
           );

           return redirect()->route('all.blog')->with($notification);

    }
    

}
