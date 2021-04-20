<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BackendOrderController extends Controller
{
    public function delete($id)
    {
        $order = Order::find($id);
        if ( ! $order) {
            Log::info('Delete fail, not found id');
            abort(404);
        }

        $total                      = $order->od_qty * $order->od_price;
        $transaction                = Transaction::find($order->od_transaction_id);
        $transaction->t_total_money -= $total;
        $transaction->save();
        $order->delete();

        Log::info('Delete success');
        return redirect()->back();
    }

}
