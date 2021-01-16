<?php

namespace App\Http\Controllers;

use File;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('users.Team.index',compact('teams'));
    }
    public function edit($id){
        $team = Team::find($id);
        return view('users.Team.edit',compact('team'));
    }

    public function update(Request $request , $id){
        $this->validate($request,[
            'name'=>"required",
            'job'=>"required",
            'description'=>'required',
            'file'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $team = Team::find($id);
        $team->update($request->only(['name','job','facebook','twitter','instagram','linked_in','description']));
        if ($file = $request->file('file') ){
            $file_path = public_path('Team/'.$team->file->file);
            if (File::exists($file_path)) File::delete($file_path);
            $name = $file->getClientOriginalName();
            $file->move('Team',$name);
            $team->file()->update(['file'=>$name]);

        }
        return redirect()->route('teams.index');
    }
    public function show($id){
        $team = Team::find($id);
        return view('users.Team.show',compact('team'));
    }

}
