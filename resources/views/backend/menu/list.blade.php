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
    @if (isset($menus))
        @foreach($menus as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->c_name }}</td>
                <td>{{ $item->c_slug }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('get_backend.menu.update', $item->id) }}" class="btn btn-xs btn-primary">Update</a>
                    <a href="{{ route('get_backend.menu.delete', $item->id) }}" class="btn btn-xs btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
