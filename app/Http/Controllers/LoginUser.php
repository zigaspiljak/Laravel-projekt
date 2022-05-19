<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginUser extends Controller
{
    public function loginPost(Request $request)
    {
        try{
            $this->validate($request, [
                "email" => "required|string|email",
                "password" => "required|string|min:6"
            ]);
            $cred = $request->only("email", "password");
            $status = User::where("email", "LIKE", "%".$request->email."%")->limit(1)->get();
            // $status->all();
            // return $status;
            // exit();
            if($status[0]["active"] == true)
            {
                if($status[0]["status"] == "okay")
                {
                    if(Auth::attempt($cred, false))
                    {
                        $request->session()->regenerate();
                        return redirect()->intended('/');
                    }
                    return back()->with('error','Login was not successful.');
                }
                return back()->with('error','User account is limited');
            }
            return back()->with('error','User account does not exist or it is waiting for admin approval.');
        }
        catch(\Exceptions $e){
            // return view("get.register")->with(['error'=>$e]);
            return $e;
        }
    }
}
