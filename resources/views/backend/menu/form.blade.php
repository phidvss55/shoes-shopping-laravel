<form action="{{ $route }}" class="p-2" method="post">
    @csrf
    <div class="form-group">
        <label for="mn_name">Name</label>
        <input type="text" class="form-control" id=mn_name" name="mn_name" placeholder="Enter name" value="{{ old('mn_name', $menu->mn_name) ?? '' }}">
        @if($errors->first('mn_name'))
            <small class="form-text text-danger">{{ $errors->first('mn_name') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Save Category</button>
</form>
