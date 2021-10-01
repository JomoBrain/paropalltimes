<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
class TeamController extends Controller
{
    public function allTeam(){
        $teams=Team::orderBy('created_at','asc')->paginate(15);
        return view('dashboards.admins.team.index',\compact('teams'));

    }

    function createTeam(){
        return view('dashboards.admins.team.create');
    }
    function storeTeam(Request $request){
        $validatedData=$request->validate([
            'name'=>'required',
            'role'=>'required',
            'about'=>'required',
            'image'=>'required',
        ]);
        $image=\request('image');
        $imageName=time().'.'.$image->extension();
        $image->move(\public_path('teamImages'),$imageName);
        $team=new Team();
        $team->name=\request('name');
        $team->role=\request('role');
        $team->about=\request('about');        
        $team->user_id=\auth()->user()->id;
        $team->image=$imageName;       
        $team->save();
        return \back()->with('success','team member added successfully');
    }

    function singleTeam( $id){
        $team=Team::find($id);
        return view('dashboards.admins.team.show',\compact('team'));
        }
       function editTeam($id){
           $team=Team::find($id);
           return view('dashboards.admins.team.edit',\compact('team'));
      

        }
        function updateTeam(Request $request){
            $validatedData=$request->validate([
                'name'=>'required',
                'role'=>'required',
                'about'=>'required',
                'image'=>'required',
            ]);
            $image=\request('image');
            $imageName=time().'.'.$image->extension();
            $image->move(\public_path('teamImages'),$imageName);
            $team=Team::find($request->id);
            $team->name=\request('name');
            $team->role=\request('role');
            $team->about=\request('about');        
            $team->user_id=\auth()->user()->id;
            $team->image=$imageName;       
            $team->save();
            
            return \back()->with('success','team member updated successfully');
            
            
           }
         function deleteTeam($id){
            $team=Team::find($id);
            \unlink(\public_path('teamImages').'/'.$team->image);
            $team->delete();
            return \back()->with('success','team member deleted successfully');
            
       
 
         }





   
}
