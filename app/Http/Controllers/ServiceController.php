<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
class ServiceController extends Controller
{
    
    public function allServices(){
        $services=Service::orderBy('created_at','asc')->paginate(15);
        return view('dashboards.admins.services.index',\compact('services'));

    }

    function createService(){
        return view('dashboards.admins.services.create');
    }
    function storeService(Request $request){
        $validatedData=$request->validate([
            'services'=>'required',
            'title'=>'required',
         
            'image'=>'required',
        ]);
        $image=\request('image');
        $imageName=time().'.'.$image->extension();
        $image->move(\public_path('serviceImages'),$imageName);
        $service=new Service();
        $service->title=\request('title');
        $service->services=\request('services');
          
        $service->user_id=\auth()->user()->id;
        $service->image=$imageName;       
        $service->save();
        return \back()->with('success','service added successfully');
    }

    function singleService( $id){
        $service=Service::find($id);
        return view('dashboards.admins.service.show',\compact('service'));
        }
       function editService($id){
           $service=Service::find($id);
           return view('dashboards.admins.services.edit',\compact('service'));
      

        }
        function updateService(Request $request){
            $validatedData=$request->validate([
                
                'title'=>'required',             
                'services'=>'required',
                'image'=>'required',
            ]);
            $image=\request('image');
            $imageName=time().'.'.$image->extension();
            $image->move(\public_path('serviceImages'),$imageName);
            $service= Service::find($request->id);
            $service->title=\request('title');
            $service->services=\request('services');              
            $service->user_id=\auth()->user()->id;
            $service->image=$imageName;       
            $service->save();
            return \back()->with('success','service updated successfully');
            
       
 
         }
         function deleteService($id){
            $service=Service::find($id);
            \unlink(\public_path('serviceImages').'/'.$service->image);
            $service->delete();
            return \back()->with('success','service deleted successfully');
            
       
 
         }





}
