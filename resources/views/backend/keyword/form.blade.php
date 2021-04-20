<form action="{{ $route }}" class="p-2" method="post">
    @csrf
    <div class="form-group">
        <label for="k_name">Name</label>
        <input type="text" class="form-control" id=k_name" name="k_name" placeholder="Enter name" value="{{ old('k_name', $keyword->k_name) ?? '' }}">
        @if($errors->first('k_name'))
            <small class="form-text text-danger">{{ $errors->first('k_name') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Save Keyword</button>
</form>
