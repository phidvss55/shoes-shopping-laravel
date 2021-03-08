@extends('layouts.app_backend')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <h2> Backend Product
        <a href="{{ route('get_backend.product.create') }}" class="btn btn-xs btn-primary pull-right">{{ __('Thêm mới') }}</a>
    </h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Price</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if (isset($products))
            @foreach($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pro_name }}</td>
                    <td>{{ $item->pro_slug }}</td>
                    <td>
                        <span class="text-danger">{{ number_format($item->pro_price, 2, ',', '.') }}</span>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('get_backend.product.update', $item->id) }}" class="btn btn-xs btn-primary">Update</a>
                        <a href="{{ route('get_backend.product.delete', $item->id) }}" class="btn btn-xs btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop
