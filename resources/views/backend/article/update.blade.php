@extends('layouts.app_backend')
@section('title', 'Cập nhật bài viết')
@section('content')
    @include('backend.article.form', ['route' => route('get_backend.article.update', $article->id)])
@stop
