<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendHomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        return view('backend.index');
    }
}
