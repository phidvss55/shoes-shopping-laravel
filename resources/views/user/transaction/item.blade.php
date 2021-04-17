@extends('layouts.app_user')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <h2> Backend Order Detail #{{ $transaction->id }} - Total <strong>{{ number_format($transaction->t_total_money, 0, ',', '.') }} VND</strong></h2>
    <p>Status <span class="text-{{ $transaction->getStatus($transaction->t_status)['class'] }}">
            {{ $transaction->getStatus($transaction->t_status)['name'] }}</span>
    </p>
{{--    <div class="my-1">--}}
{{--        <a href="{{ route('get_backend.transaction.action', $transaction->id) }}" class="btn btn-success btn-action-status" data-status="{{ \App\Models\Transaction::STATUS_SUCCESS }}">Completed</a>--}}
{{--        <a href="{{ route('get_backend.transaction.action', $transaction->id) }}" class="btn btn-danger btn-action-status" data-status="{{ \App\Models\Transaction::STATUS_CANCEL--}}
{{--        }}">Cancel</a>--}}
{{--    </div>--}}
    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Sale</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Time</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @if (isset($orders))
            @foreach($orders as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="">
                            <img src="{{ pare_url_file($item->product->pro_avatar) }}" alt="{{ $item->product->pro_name }}" class="img-thumbnail" style="width:60px;height:60px">
                        </a>
                    </td>
                    <td><strong>{{ $item->product->pro_name ?? '' }}</strong></td>
                    <td>
                        <span class="text-danger">
                            {{ number_format($item->od_price, 0, ',', '.') ?? 0 }}
                        </span>
                    </td>
                    <td>{{ number_format($item->od_sale, 0, ',', '.') ?? 0 }}</td>
                    <td>{{ $item->od_qty ?? 1 }}</td>
                    <td>
                        <span class="text-danger">{{ number_format($item->od_price * $item->od_qty, 0, ',', '.') }}</span>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        @if ($item->t_status == \App\Models\Transaction::STATUS_DEFAULT)
                            <a href="{{ route('get_user.order.delete', $item->id) }}" class="btn btn-xs btn-danger">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop
