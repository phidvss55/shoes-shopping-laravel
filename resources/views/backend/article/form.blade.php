<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<form action="{{ $route }}" class="p-2" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                    <div class="form-group">
                        <label for="a_name">Name</label>
                        <input type="text" class="form-control" id=a_name" name="a_name" placeholder="Enter name" value="{{ old('a_name', $article->a_name ?? '') }}">
                        @if($errors->first('a_name'))
                            <small class="form-text text-danger">{{ $errors->first('a_name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="a_menu_id">Menu</label>
                        <select name="a_menu_id" id="a_menu_id" class="form-control">
                            <option value="" disabled selected> -- {{ __('Please select menu') }} --</option>
                            @foreach ($menus as $item)
                                <option value="{{ $item->id }}" {{ old('a_menu_id', $article->a_menu_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->mn_name
                                }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('a_menu_id'))
                            <small class="form-text text-danger">{{ $errors->first('a_menu_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tag_select">Tag - Từ khoá</label>
                        <select name="tags[]" id="tag_select" class="form-control" multiple>
                            <option value="" disabled> -- Please select tag -- </option>
                            @foreach ($tags as $item)
                                <option value="{{ $item->id }}" {{ in_array($item->id, $tagsOld) ? 'selected' : '' }}>{{ $item->t_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="a_description">Description</label>
                        <textarea name="a_description" class="form-control" id="" cols="30" rows="5">{{ old('a_description', $article->a_description ?? '') }}</textarea>
                        @if($errors->first('a_description'))
                            <small class="form-text text-danger">{{ $errors->first('a_description') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="a_content">Content</label>
                        <textarea name="a_content" class="form-control" id="" cols="30" rows="5">{{ old('a_content', $article->a_content ?? '') }}</textarea>
                        @if($errors->first('a_content'))
                            <small class="form-text text-danger">{{ $errors->first('a_content') }}</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="p-3">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="a_avatar" >
                            <label for="customFile" class="custom-file-label">Choose file</label>
                        </div>
                        @if (isset($article) && $article->a_avatar)
                            <img src="{{ pare_url_file($article->a_avatar) }}" alt="" class="img-thumbnail"
                                 style="width:100%;height:auto;max-width:100%;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2 text-white">Save Data</button>
    <a href="{{ route('get_backend.article.index') }}" class="btn btn-default mt-2">Cancel Data</a>
</form>

<script>
    $(function() {
        $('#tag_select').select2();
    });
</script>
