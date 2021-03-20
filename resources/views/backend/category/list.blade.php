<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Hot</th>
        <th>Time</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($categories))
        @foreach($categories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->c_name }}</td>
                <td>{{ $item->c_slug }}</td>
                <td>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="0" {{ $item->c_hot == 1 ? 'checked' : '' }}  class="custom-control-input">
                        <label class="custom-control-label" for="">{{ __('Nổi bật') }}</label>
                    </div>
                </td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('get_backend.category.update', $item->id) }}" class="btn btn-xs btn-primary">Update</a>
                    <a href="{{ route('get_backend.category.delete', $item->id) }}" class="btn btn-xs btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
