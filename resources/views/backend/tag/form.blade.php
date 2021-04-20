<form action="{{ $route }}" class="p-2" method="post">
    @csrf
    <div class="form-group">
        <label for="t_name">Name</label>
        <input type="text" class="form-control" id=t_name" name="t_name" placeholder="Enter name" value="{{ old('t_name', $tag->t_name) ?? '' }}">
        @if($errors->first('t_name'))
            <small class="form-text text-danger">{{ $errors->first('t_name') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Save Tag</button>
</form>
