<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BackendCategoryController extends Controller
{
    protected $folder = 'backend.category';

    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        $category   = new Category();
        $viewData   = [
            'categories' => $categories,
            'category'   => $category,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function store(BackendCategoryRequest $request)
    {
        $requestDatas = $request->except('_token');

        $requestDatas['c_slug']     = Str::slug($requestDatas['c_name']);
        $requestDatas['created_at'] = Carbon::now();
        $categories                 = Category::Create($requestDatas);
        if ( ! $categories) {
            throw new \Exception('Create category is not success.');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = Category::orderByDesc('id')->get();
        $category   = Category::find($id);
        $viewData   = [
            'categories' => $categories,
            'category'   => $category,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendCategoryRequest $request, $id)
    {
        $data               = $request->except('_token');
        $data['c_slug']     = Str::slug($data['c_name']);
        $data['updated_at'] = Carbon::now();
        $category           = Category::find($id);
        if ($category) {
            $category->update($data);

            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();

            return redirect()->back();
        } else {
            throw new \Exception('Delete fail');
        }
    }
}
