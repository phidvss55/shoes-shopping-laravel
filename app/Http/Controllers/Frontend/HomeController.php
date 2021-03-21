<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productsHot   = Product::where('pro_hot', config('constant.hot'))
                                ->select('id', 'pro_name', 'pro_slug', 'pro_price', 'pro_avatar')
                                ->limit(8)
                                ->get();
        $slide         = Slide::limit(1)->first();
        $categoriesHot = Category::where('c_hot', config('constant.hot'))->limit(4)->get();

        $viewData      = [
            'productsHot'   => $productsHot,
            'slide'         => $slide,
            'categoriesHot' => $categoriesHot,
        ];

        return view('frontend.home.index', $viewData);
    }
}
