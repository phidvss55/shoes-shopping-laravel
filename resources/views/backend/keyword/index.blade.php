@extends('layouts.app_backend')
@section('title', 'Keyword list')
@section('content')
    <h1>Danh sach Keywords</h1>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($keywords))
                            @foreach($keywords as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->k_name }}</td>
                                    <td>{{ $item->k_slug }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get_backend.keyword.update', $item->id) }}" class="btn btn-xs btn-primary">Update</a>
                                        <a href="{{ route('get_backend.keyword.delete', $item->id) }}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                @include('backend.keyword.form', ['route' => route('get_backend.keyword.store')])
            </div>
        </div>
    </div>
@stop