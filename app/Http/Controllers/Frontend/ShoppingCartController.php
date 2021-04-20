<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
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
        $user = User::find(get_data_user('web'));
        $viewData = [
            'user'      => $user,
            'products'  => $products
        ];
        return view('frontend.shopping.checkout', $viewData);
    }

    public function payment(Request $request)
    {
        $dataTransaction = $request->except('_token');
        $dataTransaction['created_at'] = Carbon::now();
        $dataTransaction['t_user_id'] = get_data_user('web') ?? 0;
        $dataTransaction['t_total_money'] = (int)str_replace(',', '', \Cart::priceTotal(0));

        $transaction = Transaction::create($dataTransaction);
        if ($transaction) {
            $products = \Cart::content();
            foreach ($products as $item) {
               Order::create([
                    'od_transaction_id' => $transaction->id,
                    'od_product_id' => $item->id,
                    'od_sale' => 0,
                    'od_qty' => $item->qty,
                    'od_price' => $item->price,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        \Cart::destroy();
        return redirect()->route('get.home');
    }
}
