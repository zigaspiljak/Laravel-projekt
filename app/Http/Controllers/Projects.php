<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Projects extends Controller
{
    public function projectViewUsers(Request $request)
    {
        if($request->username == "" || User::where("name",$request->username)->limit(1)->count()<=0)
        {
            return abort(404);
        }
        try {$res = Project::where("id_users", User::where("name",$request->username)->limit(1)->get()->pluck("id"))->orderBy('timestamp', 'Desc')->get();} catch(\Exception $e) {return $e;}
        if($res->count()>0)
        {
            return view("user")->with("projects", $res);
        }
        return view("user")->with(["error"=> "empty"]);
    }

    public function projectAdd(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            // "timestamp" => "required|date"
        ]);
        $project = new Project();
        $project->name=$request->input("name");
        $project->timestamp=date("Y/m/d h:i:s");
        $project->id_users=Auth::id();
        $project->save();
        return redirect()->route("get.welcome");
    }

    public function projectDelete(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            // "timestamp" => "required|date"
        ]);
        $project = Project::where("name","LIKE","%".$request->name."%")->where("id_users", Auth::id())->delete();
        return response()->json(['success'=>true]);
        // return redirect()->route("get.welcome");
    }

    public function projectView(Request $request)
    {
        try {$res = Project::where("id_users", Auth::id())->orderBy('timestamp', 'Desc')->get();} catch(\Exception $e) {return $e;}
        if($res->count()>0)
        {
            return view("welcome")->with("projects", $res);
        }
        return view("welcome")->with(["error"=> "empty"]);
    }
}
