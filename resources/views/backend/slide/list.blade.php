<table class="table table-hover">
    <thead>
    <tr>
        <th width="5%">ID</th>
        <th width="5%">Avatar</th>
        <th width="15%">Title</th>
        <th width="25%">Description</th>
        <th width="15%">Link</th>
        <th width="10%">Time</th>
        <th width="15%">Action</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($slides))
        @foreach($slides as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="">
                        <img src="{{ pare_url_file($item->s_banner) }}" alt="{{ $item->s_title }}" class="img-thumbnail" style="width:60px;height:60px">
                    </a>
                </td>
                <td>{{ $item->s_title }}</td>
                <td>{{ $item->s_description }}</td>
                <td>{{ $item->s_link }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('get_backend.slide.update', $item->id) }}" class="btn btn-sm btn-primary">Update</a>
                    <a href="{{ route('get_backend.slide.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
