<form action="{{ $route }}" class="p-2" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="s_title">Title</label>
        <input type="text" class="form-control" id=s_title" name="s_title" placeholder="Enter name" value="{{ old('s_title', $slide->s_title ?? '') }}">
        @if($errors->first('s_title'))
            <small class="form-text text-danger">{{ $errors->first('s_title') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="s_description">Description</label>
        <textarea name="s_description" class="form-control" id="" cols="30" rows="5">{{ old('s_description', $slide->s_description ?? '') }}</textarea>
        @if($errors->first('s_description'))
            <small class="form-text text-danger">{{ $errors->first('s_description') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="s_link">Link</label>
        <input type="text" class="form-control" id=s_link" name="s_link" placeholder="Enter name" value="{{ old('s_link', $slide->s_link ?? '') }}">
        @if($errors->first('s_link'))
            <small class="form-text text-danger">{{ $errors->first('s_link') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="s_text">Text</label>
        <input type="text" class="form-control" id=s_text" name="s_text" placeholder="Enter name" value="{{ old('s_text', $slide->s_text ?? '') }}">
        @if($errors->first('s_text'))
            <small class="form-text text-danger">{{ $errors->first('s_text') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="">Banner</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="s_banner">
            <label for="customFile" class="custom-file-label">Choose file</label>
        </div>

        @if (isset($slide) && $slide->s_banner)
            <img src="{{ pare_url_file($slide->s_banner) }}" alt="" class="img-thumbnail"
                 style="width:100%;height:auto;max-width:100%;margin-top:15px;">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Save Slide</button>
</form>
