<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){

        return view('dashboards.users.index');
       }
    
       function reviews(){
           return view('dashboards.users.reviews');
       }
       function services(){
           return view('dashboards.users.services');
       }
       function team(){
        return view('dashboards.users.team');
    }
    
}
