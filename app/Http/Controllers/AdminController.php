<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
class AdminController extends Controller
{
    function index(){
        return view('dashboards.admins.index');
       }
    //reviews
    //    function reviews(){
    //        return view('dashboards.admins.reviews');
    //    }
       function createReview(){
           return view('dashboards.admins.rev.create');
       }
       function storeReview(Request $request){
           $validatedData=$request->validate([
               'name'=>'required',
               'email'=>'required',
               'occupation'=>'required',
               'message'=>'required',
               'image'=>'required',
           ]);
           $image=\request('image');
           $imageName=time().'.'.$image->extension();
           $image->move(\public_path('reviewImages'),$imageName);
           $review=new Review();
           $review->name=\request('name');
           $review->email=\request('email');
           $review->occupation=\request('occupation');
           $review->message=\request('message');
           $review->user_id=\auth()->user()->id;
           $review->image=$imageName;

          
           $review->save();
           return \back()->with('success','review added successfully');


       }
       public function allReviews(){
           $reviews=Review::orderBy('created_at','asc')->paginate(15);
           return view('dashboards.admins.rev.index',\compact('reviews'));

       }
       function singleReview( $id){
        $review=Review::find($id);
        return view('dashboards.admins.rev.show',\compact('review'));
        }
       function editReview($id){
           $review=Review::find($id);
           return view('dashboards.admins.rev.edit',\compact('review'));
      

        }
        function updateReview(Request $request){
            $validatedData=$request->validate([
                'name'=>'required',
                'email'=>'required',
                'occupation'=>'required',
                'message'=>'required',
                'image'=>'required',
            ]);
            $image=\request('image');
            $imageName=time().'.'.$image->extension();
            $image->move(\public_path('reviewImages'),$imageName);
            $review=Review::find($request->id);
            $review->name=\request('name');
            $review->email=\request('email');
            $review->occupation=\request('occupation');
            $review->message=\request('message');
            $review->user_id=\auth()->user()->id;
            $review->image=$imageName;

            $review->save();
            return \back()->with('success','review updated successfully');
            
            
           }
         function deleteReview($id){
            $review=Review::find($id);
            \unlink(\public_path('reviewImages').'/'.$review->image);
            $review->delete();
            return \back()->with('success','review deleted successfully');
            
       
 
         }






       //reviewa
       function services(){
           return view('dashboards.admins.services');
       }
       function team(){
        return view('dashboards.admins.team');
    }

}
