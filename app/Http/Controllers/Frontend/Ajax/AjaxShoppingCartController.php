<?php

namespace App\Http\Controllers\Frontend\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Session;
use League\CommonMark\Extension\TableOfContents\Normalizer\AsIsNormalizerStrategy;

class AjaxShoppingCartController extends Controller
{
    public function index(Request $request)
    {
        if ($request->paymentId) {
            \Cart::destroy();
            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Payments success',
            ]);

            return redirect()->route('get.home');
        }
        $shopping = \Cart::content();
        $viewData = [
            'title_page' => 'Carts list',
            'shopping'   => $shopping,
        ];

        return view('frontend.pages.shopping.index', $viewData);
    }

    public function add(Request $request, $id)
    {
        if ($request->ajax()) {
            $qty = $request->qty;
            $product = Product::find($id);
            if ( ! $product) {
                return response()->json([
                    'status' => 404,
                ]);
            }
            if ($product->pro_number < 1) {
                return response()->json([
                    'status'  => '200',
                    'message' => 'Sorry, numbers of products is not enought. Please wait for updating products.',
                ]);
            }
            $cart = \Cart::content();
            $idCartProduct = $cart->search(function ($cartItem) use ($product) {
                if ($cartItem->id == $product->id) {
                    return $cartItem->id;
                }
            });
            if ($idCartProduct) {
                $productByCart = \Cart::get($idCartProduct);
                if ($product->pro_number < ($productByCart->qty + $qty)) {
                    return response()->json([
                        'status'    => '200',
                        'message' => 'Sorry, number of products is not enought. Please wait for another update',
                    ]);
                }
            }

            \Cart::add([
                'id'      => $product->id,
                'name'    => $product->pro_name,
                'qty'     => $qty,
                'price'   => $product->pro_price,
                'weight'  => '1',
                'options' => [
//                    'sale'      => $product->pro_sale,
//                    'price_old' => $product->pro_price,
                    'image'     => $product->pro_avatar,
                ],
            ]);
            return response()->json([
                'status'    => '200',
                'message' => 'Add product to cart successful.',
            ]);
        }
    }
}

