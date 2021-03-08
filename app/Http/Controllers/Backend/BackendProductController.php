<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendProductRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BackendProductController extends Controller
{
    protected $folder = 'backend.product';

    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(10);
        $product  = new Product();
        $viewData = [
            'products' => $products,
            'product'  => $product,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function create()
    {
        $categories = Category::select('id', 'c_name')->get();
        $viewData = ['categories' => $categories];
        return view($this->folder . '.create', $viewData);
    }

    public function store(BackendProductRequest $request)
    {
        $requestDatas = $request->all();

        $requestDatas['pro_slug']   = Str::slug($requestDatas['pro_name']);
        $requestDatas['created_at'] = Carbon::now();
        $product                    = Product::Create($requestDatas);
        if ( ! $product) {
            throw new \Exception('Create product is not success.');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = Category::select('id', 'c_name')->get();
        $product    = Product::find($id);
        $viewData   = [
            'categories' => $categories,
            'product'    => $product,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendProductRequest $request, $id)
    {
        $requestDatas = $request->all();
        $product = new Product();
        if ($id) {
            $product = Product::find($id);
        }

        $requestDatas['pro_slug']   = Str::slug($requestDatas['pro_name']);
        $requestDatas['updated_at'] = Carbon::now();
        $product->update($requestDatas);
        if ( ! $product) {
            throw new \Exception('Update product is not success.');
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();

            return redirect()->back();
        } else {
            throw new \Exception('Delete fail');
        }
    }
}
