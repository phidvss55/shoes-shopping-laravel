@extends('layouts.app_backend')
@section('title', 'Categories list')
@section('content')
    <h1>Danh sach Categories</h1>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                    @include('backend.category.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                @include('backend.category.form', ['route' => route('get_backend.category.store')])
            </div>
        </div>
    </div>
@stop
