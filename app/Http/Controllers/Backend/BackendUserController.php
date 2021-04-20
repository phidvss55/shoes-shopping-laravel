<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BackendUserController extends Controller
{
    protected $folder = 'backend.user';

    public function index()
    {
        $users    = User::orderByDesc('id')->paginate(20);
        $viewData = [
            'users' => $users,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function create()
    {
        return view($this->folder . '.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        return view($this->folder . '.update');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        $user = User::find($id);
        if ( ! $user) {
            abort(404);
        }

        Log::info('Deleted user ' . json_encode($user->toArray()));
        $user->delete();

        return redirect()->back();
    }
}
