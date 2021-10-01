<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    public function allBlogs(){
        $blogs=Blog::orderBy('created_at','desc')->paginate(6);
        return view('dashboards.admins.blog.index',\compact('blogs'));

    }

    function createBlog(){
        return view('dashboards.admins.blog.create');
    }
    function storeBlog(Request $request){
        $validatedData=$request->validate([
            'title'=>'required',
            'image'=>'required',
            'body'=>'required',
           
        ]);
        $image=\request('image');
        $imageName=time().'.'.$image->extension();
        $image->move(\public_path('blogImages'),$imageName);
        $blog=new Blog();
        $blog->title=\request('title');
        $blog->body=\request('body');
               
        $blog->user_id=\auth()->user()->id;
        $blog->image=$imageName;       
        $blog->save();
        return \back()->with('success','blog created successfully');
    }

    function singleBlog( $id){
        $blog=Blog::find($id);
        return view('dashboards.admins.blog.show',\compact('blog'));
        }
        function sB( $id){
            $blog=Blog::find($id);
            return view('homepage.blog',\compact('blog'));
            }
       function editBlog($id){
           $blog=Blog::find($id);
           return view('dashboards.admins.blog.edit',\compact('blog'));
      

        }
        function updateBlog(Request $request){
            $validatedData=$request->validate([
                'title'=>'required',
                'body'=>'required',
                
                'image'=>'required',
            ]);
            $image=\request('image');
            $imageName=time().'.'.$image->extension();
            $image->move(\public_path('blogImages'),$imageName);
            $blog=Blog::find($request->id);
            $blog->title=\request('title');
            $blog->body=\request('body');
                
            $blog->user_id=\auth()->user()->id;
            $blog->image=$imageName;       
            $blog->save();
       
            
            return \back()->with('success','blog updated successfully');
            
            
           }
         function deleteBlog($id){
            $blog=Blog::find($id);
            \unlink(\public_path('blogImages').'/'.$blog->image);
            $blog->delete();
            return \back()->with('success','blog deleted successfully');
            
       
 
         }

}
