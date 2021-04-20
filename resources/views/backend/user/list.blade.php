<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Time</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($users))
        @foreach($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="">
                        <img src="{{ pare_url_file($item->avatar) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width:60px;height:60px">
                    </a>
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('get_backend.user.update', $item->id) }}" class="btn btn-xs btn-primary">Update</a>
                    <a href="{{ route('get_backend.user.delete', $item->id) }}" class="btn btn-xs btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
