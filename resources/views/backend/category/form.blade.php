<form action="{{ $route }}" class="p-2" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="c_name">Name</label>
        <input type="text" class="form-control" id=c_name" name="c_name" placeholder="Enter name" value="{{ old('c_name', $category->c_name ?? '') }}">
        @if($errors->first('c_name'))
            <small class="form-text text-danger">{{ $errors->first('c_name') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="c_parent_id">Parent category</label>
        <select name="c_parent_id" id="c_parent_id" class="form-control">
            <option value="" disabled selected> -- {{ __('Please select parent category') }} --</option>
            @foreach ($categoryParent as $item)
                <option value="{{ $item->id }}" {{ old('c_parent_id', $category->c_parent_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->c_name
                                }}</option>
            @endforeach
        </select>
        @if($errors->first('c_parent_id'))
            <small class="form-text text-danger">{{ $errors->first('pro_category_id') }}</small>
        @endif
    </div>
    <div class="form-group">
        <div class="custom-control custom-radio custom-control-inline">
            <input id="rad_c_hot_1" type="radio" name="c_hot" value="0" {{ ($category->c_hot ?? 0) == 0 ? 'checked' : '' }} class="custom-control-input">
            <label for="rad_c_hot_1" class="custom-control-label">{{ __('Mặc định') }}</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input id="rad_c_hot_2" type="radio" name="c_hot" value="1" {{ ($category->c_hot ?? 0) == 1 ? 'checked' : '' }} class="custom-control-input">
            <label for="rad_c_hot_2" class="custom-control-label">{{ __('Nổi bật') }}</label>
        </div>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="c_avatar">
            <label for="customFile" class="custom-file-label">Choose file</label>
        </div>

        @if (isset($category) && $category->c_avatar)
            <img src="{{ pare_url_file($category->c_avatar) }}" alt="" class="img-thumbnail"
                 style="width:100%;height:auto;max-width:100%;margin-top:15px;">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Save Category</button>
</form>
