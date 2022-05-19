<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Ramsey\Uuid\Uuid;


class RegisterUser extends Controller
{
    public function registerPost(Request $request) 
    {
        $this->validate($request, [
            "name" => "required|string|between:2,100",
            "email" => "required|string|email|max:100|unique:users",
            "password" => "required|string|min:6",
        ]);
        try{
        if($request->input("admin")=="on")
        {
            $admin = true;
        }
        else
        {
            $admin = false;
        }
        $user = new User;
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $geslo = $request->input("password");
        $user->admin = $admin;
        $user->active = false;
        $user->status = "locked";
        $user->password = app("hash")->make($geslo);
        $user->api_key = hash('sha1',Uuid::uuid1()->toString(),false);
        $user->save();
        return redirect('login')->withSuccess("created");
        }
        catch(\Exceptions $e){
            return $e;
        }
    }

    public function apiRegisterPost(Request $request) 
    {
        $this->validate($request, [
            "name" => "required|string|between:2,100",
            "email" => "required|string|email|max:100|unique:users",
            "password" => "required|string|min:6",
        ]);
        try{
        if($request->input("admin")=="on")
        {
            $admin = true;
        }
        else
        {
            $admin = false;
        }
        $user = new User;
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $geslo = $request->input("password");
        $user->admin = $admin;
        $user->active = false;
        $user->status = "locked";
        $user->password = app("hash")->make($geslo);
        $user->api_key = hash('sha1',Uuid::uuid1()->toString(),false);
        $user->save();
        return response()->json(["status"=>"created"]);
        }
        catch(\Exceptions $e){
            return $e;
        }
    }
}
