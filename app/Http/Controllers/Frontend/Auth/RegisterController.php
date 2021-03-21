<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('frontend.auth.register');
    }

    public function postRegister(Request $request) {
        $requestDatas = $request->except('_token');
        $requestDatas['password'] = bcrypt($requestDatas['password']);
        $requestDatas['created_at'] = Carbon::now();
        $user = User::create($requestDatas);
        if (\Auth::loginUsingId($user->id)) {
            return redirect()->route('get.home');
        }
        return redirect()->back();
    }
}
