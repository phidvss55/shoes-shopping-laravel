@extends('layouts.app_user')
@section('title', 'Update profile user')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="">Email address</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="">Phone number</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Enter phone">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->address }}" placeholder="Enter address">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
