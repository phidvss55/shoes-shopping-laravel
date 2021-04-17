<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('t_user_id', get_data_user('web'))->orderByDesc('id')->paginate(20);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('user.transaction.index', $viewData);
    }

    public function view(Request $request, $id)
    {
        $transaction    = Transaction::where('t_user_id', get_data_user('web'))->find($id);
        $orders         = Order::with('product')->where('od_transaction_id', $id)->get();

        if (!$transaction) abort(404);
        $viewData = [
            'transaction'   => $transaction,
            'orders'        => $orders
        ];

        return view('user.transaction.item', $viewData);
    }

    public function action($id, Request $request)
    {
        if ($request->ajax())
        {
            $transaction = Transaction::find($id);
            if ($transaction) {
                $requestStatus = $request->status;
                if ((int)$requestStatus === Transaction::STATUS_CANCEL) {
                    if ($transaction->t_status == Transaction::STATUS_DEFAULT) {
                        $transaction->t_status = Transaction::STATUS_CANCEL;
                    } else {
                        Log::info('Can not cancel status of this transaction. Current status is not ' . Transaction::STATUS_DEFAULT);
                    }
                } else {
                    $transaction->t_status = Transaction::STATUS_SUCCESS;
                }
                $transaction->save();
            } else {
                Log::info('Not found transaction');
            }
        }
        return redirect()->back();
    }

}
