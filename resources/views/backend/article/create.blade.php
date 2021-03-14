@extends('layouts.app_backend')
@section('title', 'Thêm mới bài viết');
@section('content')
    @include('backend.article.form', ['route' => route('get_backend.article.store')])
@stop
