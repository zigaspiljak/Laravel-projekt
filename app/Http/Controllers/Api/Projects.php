<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Projects extends Controller
{
    public function apiViewProjects(Request $request)
    {
        $projects = Project::limit(100)->pluck("name");
        if($request->header("api_key")!=="")
        {
            if(User::where("api_key", $request->header("api_key"))->count()===1)
            {
                $projects = DB::table("projects")->join("users", "users.id", "=", "projects.id_users")->select("users.name AS u_name", "projects.name AS p_name")->get();
            }
        }
        
        return response()->json(["projects"=>$projects]);
    }
}
