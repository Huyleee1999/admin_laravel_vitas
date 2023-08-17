@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa người dùng</h1>
    </div>


    <form action="{{route('admin.update-users', ['id' => $users->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Tên người dùng:</label>
            <input type="text" name="users-name" class="form-control" placeholder="Nhập tên người dùng..."value="{{$users->name}}">
            @error('users-name')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Số điện thoại:</label>
            <input type="text" name="users-phone" class="form-control" placeholder="Nhập số điện thoaị..."value="{{$users->phone}}">
            @error('users-phone')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email:</label>
            <input type="email" name="users-email" class="form-control" placeholder="Nhập email..."value="{{$users->email}}">
            @error('users-email')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Tỉnh thành:</label>
            <select name="city_id" class="form-control">
                <option value="">-- Chọn tỉnh thành --</option>
                @foreach ($city as $cityItem)
                    <option value="{{$cityItem->id}}" {{$users->city_id == $cityItem->id ? 'selected' : false}}>{{$cityItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Slug:</label>
            <input type="text" name="slug" class="form-control" placeholder="Nhập tên người dùng..."value="{{$users->slug}}">
            @error('slug')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-add float-right">Cập nhật</button>
        <a href="{{route('admin.users')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection