<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    public function contact(){
        return view('welcome');
    }
    

    public function sendMail(Request $request){
        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];

        Mail::to('tracynover355@gmail.com')->send(new ContactMail($details));
        return \back()->with("msg","Thank you for contacting parop all times");

    }









}
