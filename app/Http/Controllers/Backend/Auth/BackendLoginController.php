<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendLoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (\Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('get_backend.home');
        }
        return redirect()->back();
    }

    public function getLogoutAdmin(Request $request)
    {
        \Auth::guard('admins')->logout();
        $request->session()->invalidate();
        return redirect()->to('/');
    }

    public function getProfile() {
        return auth()->user()->toArray();
    }
}
