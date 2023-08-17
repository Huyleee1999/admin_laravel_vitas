@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm diễn đàn</h1>
    </div>


    <form action="{{route('admin.add-forums')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="">Diễn đàn:</label>
            <input type="text" name="forums-name" class="form-control" placeholder="Nhập tên diễn đàn..."value="{{old('forums-name')}}">
            @error('forums-name')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nội dung:</label>
            <textarea type="text" rows="5" name="forums-content" class="form-control mySummernote" placeholder="Nhập nội dung...">{{old('forums-content')}}</textarea>
            @error('forums-content')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Được tạo bởi:</label>
            <select name="created_by" class="form-control">
                <option value="">-- Chọn người tạo --</option>
                @foreach ($users as $usersItem)
                    <option value="{{$usersItem->id}}">{{$usersItem->name}}</option>
                @endforeach
            </select>
            @error('created_by')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Chủ đề:</label>
            <select name="topic_id" class="form-control">
                <option value="">-- Chọn chủ đề --</option>
                @foreach ($topics as $topicsItem)
                    <option value="{{$topicsItem->id}}">{{$topicsItem->name}}</option>
                @endforeach
            </select>
            @error('topic_id')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Slug:</label>
            <input type="text" name="slug" class="form-control" placeholder="Nhập slug..."value="{{old('slug')}}">
            @error('slug')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Highlight:</label>
            <select name="is_highlight" class="form-control">
                <option value="0" {{old('is_highlight')==0?'selected':false}}>Chưa hiển thị</option>
                <option value="1" {{old('is_highlight')==1?'selected':false}}>Hiển thị</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="">Trạng thái:</label>
            <select name="status" class="form-control">
                <option value="0" {{old('status')==0?'selected':false}}>Chưa kích hoạt</option>
                <option value="1" {{old('status')==1?'selected':false}}>Kích hoạt</option>
            </select>
        </div>

        <button type="submit" class="btn btn-add float-right">Thêm mới</button>
        <a href="{{route('admin.forums')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection