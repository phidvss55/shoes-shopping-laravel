<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendProductRequest;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BackendProductController extends Controller
{
    protected $folder = 'backend.product';

    public function index()
    {
        $products = Product::with('category:id,c_name')->orderByDesc('id')->paginate(10);
        $product  = new Product();
        $viewData = [
            'products' => $products,
            'product'  => $product,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function assignValue()
    {
        $categories = Category::select('id', 'c_name')->get();
        $keywords   = Keyword::select('id', 'k_name')->get();
        $keywordOld = [];

        return [
            'categories' => $categories,
            'keywords'   => $keywords,
            'keywordOld' => $keywordOld,
        ];
    }

    public function create()
    {
        $viewData = $this->assignValue();

        return view($this->folder . '.create', $viewData);
    }

    public function store(BackendProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $requestDatas               = $request->except('_token');
            $requestDatas['pro_slug']   = Str::slug($requestDatas['pro_name']);
            $requestDatas['created_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 'pro_avatar');
            $product = Product::create($requestDatas);

            if ( ! $product) {
                throw new \Exception('Create product is not success.');
            }
            $product->keywords()->attach($requestDatas['keywords']);
            DB::commit();

            return redirect()->route('get_backend.product.index');
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        $product             = Product::find($id);
        $viewData            = $this->assignValue();
        $viewData['product'] = $product;

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $requestDatas = $request->except('_token');
            $product      = Product::find($id);
            if ( ! $product) {
                abort(404);
            }
            $requestDatas['pro_slug']   = Str::slug($requestDatas['pro_name']);
            $requestDatas['updated_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 'pro_avatar');
            $product->update($requestDatas);

            if (isset($requestDatas['keywords'])) {
                $product->keywords()->sync($requestDatas['keywords']);
            }
            DB::commit();
            return redirect()->route('get_backend.product.index');
        } catch (\Exception $exception) {
            Log::info('[Exception] ' . $exception->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
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
