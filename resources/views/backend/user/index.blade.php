@extends('layouts.app_backend')
@section('title', 'User list')
@section('content')
    <h1>Danh sach Users</h1>
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="p-3">
                    @include('backend.user.list')
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
{{--                @include('backend.user.form', ['route' => route('get_backend.user.store')])--}}
            </div>
        </div>
    </div>
@stop
