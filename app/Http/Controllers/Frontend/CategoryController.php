<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $slug)
    {
        $category = Category::where('c_slug', $slug)->first();
        if ( ! $category) {
            abort(404);
        }
        $products = Product::where('pro_category_id', $category->id)
                           ->select('id', 'pro_name', 'pro_slug', 'pro_price', 'pro_avatar')
                           ->paginate(12);
        $viewData = [
            'title'    => $category->c_name,
            'category' => $category,
            'products' => $products,
        ];

        return view('frontend.category.index', $viewData);
    }
}
