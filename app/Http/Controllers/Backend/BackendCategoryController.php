<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BackendCategoryController extends Controller
{
    protected $folder = 'backend.category';

    public function index()
    {
        $categories     = Category::with('parent:id,c_name')->orderByDesc('id')->get();
        $categoryParent = Category::where('c_parent_id', config('constant.parent_id'))->get();
        $viewData       = [
            'categories'     => $categories,
            'categoryParent' => $categoryParent,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function store(BackendCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $requestDatas               = $request->except('_token');
            $requestDatas['c_slug']     = Str::slug($requestDatas['c_name']);
            $requestDatas['created_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 'c_avatar');
            $categories                 = Category::create($requestDatas);
            if ($categories) {
                DB::commit();

                return redirect()->back();
            }
            DB::rollBack();
            throw new \Exception('Create category is not success.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $categories     = Category::with('parent:id,c_name')->orderByDesc('id')->get();
        $category       = Category::find($id);
        $categoryParent = Category::where('c_parent_id', config('constant.parent_id'))->get();
        $viewData = [
            'categories'     => $categories,
            'category'       => $category,
            'categoryParent' => $categoryParent,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendCategoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $category = Category::find($id);
            if ( ! $category) {
                throw new \Exception('There are something wrong here');
            }

            $requestDatas               = $request->except('_token');
            $requestDatas['c_slug']     = Str::slug($requestDatas['c_name']);
            $requestDatas['updated_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 'c_avatar');
            $category->update($requestDatas);
            DB::commit();

            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();

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
