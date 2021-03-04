<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendSettingController extends Controller
{
    public function index() {
        return view('backend.setting.index');
    }
}
