<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class UserOrderController extends Controller
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
        if ($transaction->t_status == Transaction::STATUS_DEFAULT) {
            $transaction->t_total_money -= $total;
            $transaction->save();
            $order->delete();
            Log::info('Delete order success');
        }

        return redirect()->back();
    }
}
