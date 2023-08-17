@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa bình luận</h1>
    </div>


    <form action="{{route('admin.update-comments', ['id' => $comments->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Nội dung:</label>
            <textarea type="text" name="comments-content" rows="5" class="form-control" placeholder="Nhập nội dung bình luận...">{{$comments->content}}</textarea>
            @error('comments-content')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Diễn đàn:</label>
            <select name="forum_id" class="form-control">
                <option value="">-- Chọn diễn đàn --</option>
                @foreach ($forums as $forumsItem)
                    <option value="{{$forumsItem->id}}" {{$comments->forum_id == $forumsItem->id ? 'selected' : false}}>{{$forumsItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Người bình luận:</label>
            <select name="user_id" class="form-control">
                <option value="">-- Chọn người bình luận --</option>
                @foreach ($users as $usersItem)
                    <option value="{{$usersItem->id}}" {{$comments->user_id == $usersItem->id ? 'selected' : false}}>{{$usersItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Trạng thái:</label>
            <select name="status" class="form-control">
                <option value="0" {{$comments->status == 0 ? 'selected' : false}}>Chưa kích hoạt</option>
                <option value="1" {{$comments->status == 1 ? 'selected' : false}}>Kích hoạt</option>
            </select>
        </div>

        <button type="submit" class="btn btn-add float-right">Cập nhật</button>
        <a href="{{route('admin.comments')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection