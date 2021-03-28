<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $products = \Cart::content();
        $viewData = [
            'products' => $products
        ];
        return view('frontend.shopping.index', $viewData);
    }

    public function checkout() {
        $products = \Cart::content();
        $viewData = [
            'products' => $products
        ];
        return view('frontend.shopping.checkout', $viewData);
    }

    public function payment(Request $requset) {
        dd($requset->all());
    }
}
