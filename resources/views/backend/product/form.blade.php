<form action="{{ $route }}" class="p-2" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="p-3">
                    <div class="form-group">
                        <label for="pro_name">Name</label>
                        <input type="text" class="form-control" id=pro_name" name="pro_name" placeholder="Enter name" value="{{ old('pro_name', $product->pro_name ?? '') }}">
                        @if($errors->first('pro_name'))
                            <small class="form-text text-danger">{{ $errors->first('pro_name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pro_name">Category</label>
                        <select name="pro_category_id" id="pro_category_id" class="form-control">
                            <option value="" disabled selected> -- {{ __('Please select category') }} --</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ old('pro_category_id', $product->pro_category_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->c_name
                                }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('pro_category_id'))
                            <small class="form-text text-danger">{{ $errors->first('pro_category_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pro_description">Description</label>
                        <textarea name="pro_description" class="form-control" id="" cols="30" rows="5">{{ old('pro_description', $product->pro_description ?? '') }}</textarea>
                        @if($errors->first('pro_description'))
                            <small class="form-text text-danger">{{ $errors->first('pro_description') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pro_content">Content</label>
                        <textarea name="pro_content" class="form-control" id="" cols="30" rows="5">{{ old('pro_content', $product->pro_content ?? '') }}</textarea>
                        @if($errors->first('pro_content'))
                            <small class="form-text text-danger">{{ $errors->first('pro_content') }}</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="p-3">
                    <div class="form-group">
                        <label for="pro_price">Price</label>
                        <input type="text" class="form-control" id=pro_price" name="pro_price" placeholder="Enter name" value="{{ old('pro_price', $product->pro_price ?? 0)
                            }}">
                        @if($errors->first('pro_price'))
                            <small class="form-text text-danger">{{ $errors->first('pro_price') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pro_number">Number</label>
                        <input type="text" class="form-control" id=pro_number" name="pro_number" placeholder="Enter name" value="{{ old('pro_number', $product->pro_number ??
                            0)
                            }}">
                        @if($errors->first('pro_number'))
                            <small class="form-text text-danger">{{ $errors->first('pro_number') }}</small>
                        @endif
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="pro_avatar" >
                        <label for="customFile" class="custom-file-label">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2 text-white">Save Data</button>
    <a href="{{ route('get_backend.product.index') }}" class="btn btn-default mt-2">Cancel Data</a>
</form>
