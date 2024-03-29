@extends('layouts.app_user')
@section('title', 'Transaction List')
@section('content')
    <h2> Backend Transaction </h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Total</th>
            <th>Status</th>
            <th>Time</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @if (isset($transactions))
            @foreach($transactions as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->t_name }}</td>
                    <td>{{ $item->t_phone }}</td>
                    <td>
                        <span class="text-danger">{{ number_format($item->t_total_money , 0, ',', '.') }} VND</span>
                    </td>
                    <td>
                        <span class="label label-{{ $item->getStatus($item->t_status)['class'] }}">
                            {{ $item->getStatus($item->t_status)['name'] }}
                        </span>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('get_user.transaction.view', $item->id) }}" class="btn btn-xs btn-primary">View</a>
                        @if ($item->t_status == \App\Models\Transaction::STATUS_DEFAULT)
                            <a href="{{ route('get_user.transaction.delete', $item->id) }}" class="btn btn-xs btn-danger">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop
