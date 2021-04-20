@extends('layouts.app_backend')
@section('title', 'Thêm mới sản phẩm');
@section('content')
    @include('backend.product.form', ['route' => route('get_backend.product.store')])
@stop
