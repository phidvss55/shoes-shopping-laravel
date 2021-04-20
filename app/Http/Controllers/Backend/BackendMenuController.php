<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendMenuRequest;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BackendMenuController extends Controller
{
    protected $folder = 'backend.menu';

    public function index()
    {
        $menus    = Menu::orderByDesc('id')->get();
        $menu     = new Menu();
        $viewData = [
            'menus' => $menus,
            'menu'  => $menu,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function store(BackendMenuRequest $request)
    {
        $requestDatas = $request->except('_token');

        $requestDatas['mn_slug']    = Str::slug($requestDatas['mn_name']);
        $requestDatas['created_at'] = Carbon::now();
        $menus                      = Menu::Create($requestDatas);
        if ( ! $menus) {
            throw new \Exception('Create menu is not success.');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $menus    = Menu::orderByDesc('id')->get();
        $menu     = Menu::find($id);
        $viewData = [
            'menus' => $menus,
            'menu'  => $menu,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendMenuRequest $request, $id)
    {
        $data               = $request->except('_token');
        $data['mn_slug']    = Str::slug($data['mn_name']);
        $data['updated_at'] = Carbon::now();
        $menu               = Menu::find($id);
        if ($menu) {
            $menu->update($data);
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $menu->delete();
            return redirect()->back();
        } else {
            throw new \Exception('Delete fail');
        }
    }
}
