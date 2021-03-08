@extends('layouts.app_backend')
@section('title', 'Update Category')
@section('content')
    <h1>Danh sach Category</h1>
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
                @include('backend.category.form', ['route' => route('get_backend.category.update', $category->id) ])
            </div>
        </div>
    </div>
@stop
