@extends('layouts.app_backend')
@section('title', 'Danh sách bài viết')
@section('content')
    <h2> Backend Article
        <a href="{{ route('get_backend.article.create') }}" class="btn btn-xs btn-primary pull-right">{{ __('Thêm mới') }}</a>
    </h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Menu</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if (isset($articles))
            @foreach($articles as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="">
                            <img src="{{ pare_url_file($item->a_avatar) }}" alt="" class="img-thumbnail" style="width:60px;height:60px">
                        </a>
                    </td>
                    <td>{{ $item->a_name }}</td>
                    <td>
                        {{ $item->menu->mn_name ?? '[N/A]' }}
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('get_backend.article.update', $item->id) }}" class="btn btn-sm btn-primary">Update</a>
                        <a href="{{ route('get_backend.article.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop
