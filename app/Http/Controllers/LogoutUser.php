<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutUser extends Controller
{
    public function logoutPost(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
