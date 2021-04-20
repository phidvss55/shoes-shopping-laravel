@extends('layouts.app_user')
@section('title', 'Create vote product')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nội dung đánh giá</label>
            <textarea name="v_content" required cols="30" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="">Bình chọn</label>
            <select name="v_number" id="" class="form-control">
                <option value="5">Rất tốt</option>
                <option value="4">Tốt</option>
                <option value="3">Bình thường</option>
                <option value="2">Kém</option>
                <option value="1">Rất tệ</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
