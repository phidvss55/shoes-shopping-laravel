<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $slug)
    {
        $category = Category::where('c_slug', $slug)->first();
        if ( ! $category) {
            abort(404);
        }
        $viewData = [
            'category' => $category,
        ];

        return view('frontend.category.index', $viewData);
    }
}
