<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;

class BlogcategoryController extends Controller
{
    public function add_blogcategory(){
        $blog=Blog::orderBy('blog_category','asc')->get();
        return view('home.blogcategory.add_blogcategory',compact('blog'));
    }

    public function save_blogcategory(Request $request){
         //dd($request->all());
        $request->validate([
            //'blog_id'=> 'required',
            'blog_tittle'=> 'required',

        ]);
        $blogcate=new BlogCategory;
        if($request->blog_image){
            $image=uniqid().'.'.$request->blog_image->extension();
            Image::make($request->blog_image)->resize('430','327')->save(public_path('blog/'.$image));
            $blogcate->blog_image=$image; 
        }
        $blogcate->blog_tittle=$request->blog_tittle;
        $blogcate->blog_tags=$request->blog_tags;
        $blogcate->blog_description=$request->blog_description;
        $blogcate->blog_id=$request->blog_id;
        $blogcate->created_at=Carbon::now();

        $blogcate->save();
        $notification = array(

            'message' => 'Blog save sucesssfullly!!',
            'alert-type'=> 'success'
           );
    
        return redirect()->back()->with($notification);
    
        }

        public function all_blogcategory(){
            $blogs=Blogcategory::with('category')->paginate(3);
            // dd($blogs);
            return view ('home.blogcategory.all_blogcategory',compact('blogs'));

        }
        public function view_blogcategory($id){
            $blogs=Blogcategory::find($id);
            // dd($blogs);
            return view ('home.blogcategory.view_blogcategory',compact('blogs'));

        }
        public function edit_blogcategory($id){
            $blog=Blogcategory::find($id);
            $blogs=Blog::orderBy('blog_category','asc')->get();
            // dd($blog);
            return view ('home.blogcategory.edit_blogcategory',compact('blog','blogs'));

        }
        public function update_blogcategory(Request $request,$id){
            $request->validate([
            'blog_tittle'=> 'required',
            'blog_id'=>'required',
    
            ]);
            $blogcate=BlogCategory::find($id);
            if($request->blog_image){
                $image=uniqid().'.'.$request->blog_image->extension();
                Image::make($request->blog_image)->resize('430','327')->save(public_path('blog/'.$image));
                $blogcate->blog_image=$image; 
            }
            $blogcate->blog_tittle=$request->blog_tittle;
            $blogcate->blog_tags=$request->blog_tags;
            $blogcate->blog_description=$request->blog_description;
            $blogcate->blog_id=$request->blog_id;
            $blogcate->created_at=Carbon::now();
    
            $blogcate->save();
            $notification = array(
    
                'message' => 'Blog save sucesssfullly!!',
                'alert-type'=> 'success'
               );
        
            return redirect()->route('all.blogcategory')->with($notification);
        

        }
        public function delete_blogcategory($id){
            $blogcate=BlogCategory::find($id);
            $old_image=$blogcate->blog_image;
            unlink(public_path('blog/').$old_image);
            $blogcate->delete();
            $notification = array(
    
                'message' => 'Blog category deleted sucesssfullly!!',
                'alert-type'=> 'success'
               );
    
               return redirect()->route('all.blogcategory')->with($notification);
    
        }
     
     
}
