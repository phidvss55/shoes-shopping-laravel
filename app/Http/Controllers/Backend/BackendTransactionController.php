<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BackendTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::orderByDesc('id')->paginate(20);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('backend.transaction.index', $viewData);
    }

    public function view(Request $request, $id)
    {
        $transaction    = Transaction::find($id);
        $orders         = Order::with('product')->where('od_transaction_id', $id)->get();

        if (!$transaction) abort(404);
        $viewData = [
            'transaction'   => $transaction,
            'orders'        => $orders
        ];

        return view('backend.transaction.item', $viewData);
    }

    public function action($id, Request $request)
    {
        if ($request->ajax())
        {
            $transaction = Transaction::find($id);
            if ($transaction) {
                $status = $request->status;
                if ((int)$status === Transaction::STATUS_CANCEL) {
                    $transaction->t_status = Transaction::STATUS_CANCEL;
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

    public function delete(Request $request, $id)
    {

    }
}
