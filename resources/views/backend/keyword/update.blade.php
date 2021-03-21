@extends('layouts.app_backend')
@section('title', 'Update Keyword')
@section('content')
    <h1>Danh sach Keywords</h1>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                    @include('backend.keyword.list')
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                @include('backend.keyword.form', ['route' => route('get_backend.keyword.update', $keyword->id) ])
            </div>
        </div>
    </div>
@stop
