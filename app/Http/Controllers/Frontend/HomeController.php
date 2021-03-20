<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productsHot = Product::where('pro_hot', config('constant.hot'))
            ->select('id', 'pro_name', 'pro_slug', 'pro_price', 'pro_avatar')
            ->limit(8)
            ->get();
        $viewData = [
            'productsHot' => $productsHot
        ];
        return view('frontend.home.index', $viewData);
    }
}
