<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('frontend.auth.login');
    }

    public function postLogin(Request $request) {
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            return redirect()->route('get.home');
        }
        return redirect()->back();
    }

    public function getLogout(Request $request) {
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('get.home');
    }
}
