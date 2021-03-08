<form action="{{ $route }}" class="p-2" method="post">
    @csrf
    <div class="form-group">
        <label for="c_name">Name</label>
        <input type="text" class="form-control" id=c_name" name="c_name" placeholder="Enter name" value="{{ old('c_name', $category->c_name ?? '') }}">
        @if($errors->first('c_name'))
            <small class="form-text text-danger">{{ $errors->first('c_name') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Save Category</button>
</form>
