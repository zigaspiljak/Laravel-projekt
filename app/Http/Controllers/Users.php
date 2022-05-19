<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Users extends Controller
{
    public function getUsers( Request $request)
    {
        $user = User::where("id",Auth::id())->limit(1)->get();
        if($user[0]["admin"] == true)
        {
        $users = User::limit(100)->orderBy("name", "Asc")->get();
        if($users->count()>0)
        {
            return view("users")->with("users", $users);
        }
        return view("users")->with(["error"=> "empty"]);
        }
        // return view("errors.404");
        return abort(403);
    }

    public function usersActivate(Request $request)
    {
        $this->validate($request, [
            "email"=>"required|email|string"
        ]);
        $user = User::where("id",Auth::id())->limit(1)->get();
        if($user[0]["admin"] == true)
        {
            DB::beginTransaction();
            $user = User::where("email", "LIKE", "%".$request->email."%")->limit(1)->get();
            if($user[0]["active"] != true)
            {
                try{
                    $user = User::where("id", $user[0]["id"])->update(["active" => true]);
                }
                catch(\Exception $e)
                {
                    DB::rollBack();
                    return print_r($e);
                }

            }
            DB::commit();
            return response()->json(["success"=> true]);
        }
        return response()->json(["error"=> "notAdmin"]);
    }

    public function usersLock(Request $request)
    {
        $this->validate($request, [
            "email"=>"required|email|string"
        ]);
        $user = User::where("id",Auth::id())->limit(1)->get();
        if($user[0]["admin"] == true)
        {
            DB::beginTransaction();
            $user = User::where("email", "LIKE", "%".$request->email."%")->limit(1)->get();
            if($user[0]["status"] == "locked")
            {
                try{
                    $user = User::where("id", $user[0]["id"])->update(["status" => "okay"]);
                }
                catch(\Exception $e)
                {
                    DB::rollBack();
                    return print_r($e);
                }
            }
            else
            {
                try{
                    $user = User::where("id", $user[0]["id"])->update(["status" => "locked"]);
                }
                catch(\Exception $e)
                {
                    DB::rollBack();
                    return print_r($e);
                }
            }
            DB::commit();
            return response()->json(["success"=> true]);
        }
        return response()->json(["error"=> "notAdmin"]);
    }
}
