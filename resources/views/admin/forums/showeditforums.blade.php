@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa diễn đàn</h1>
    </div>


    <form action="{{route('admin.update-forums', ['id' => $forums->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Diễn đàn:</label>
            <input type="text" name="forums-name" class="form-control" placeholder="Nhập diễn đàn..."value="{{$forums->name}}">
            @error('forums-name')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nội dung:</label>
            <textarea type="text" name="forums-content" rows="5" class="mySummernote form-control" placeholder="Nhập nội dung diễn đàn...">{{$forums->content}}</textarea>
            @error('forums-content')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Được tạo bởi:</label>
            <select name="created_by" class="form-control">
                <option value="">-- Chọn người tạo --</option>
                @foreach ($users as $usersItem)
                    <option value="{{$usersItem->id}}" {{$forums->created_by == $usersItem->id ? 'selected' : false}}>{{$usersItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Chủ đề:</label>
            <select name="topic_id" class="form-control">
                <option value="">-- Chọn chủ đề --</option>
                @foreach ($topics as $topicsItem)
                    <option value="{{$topicsItem->id}}" {{$forums->topic_id == $topicsItem->id ? 'selected' : false}}>{{$topicsItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Slug:</label>
            <input type="text" name="slug" class="form-control" placeholder="Nhập slug..." value="{{$forums->slug}}">
            @error('slug')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Highlight:</label>
            <select name="is_highlight" class="form-control">
                <option value="0" {{$forums->is_highlight == 0 ? 'selected' : false}}>Không hiển thị</option>
                <option value="1" {{$forums->is_highlight == 1 ? 'selected' : false}}>Hiển thị</option>
            </select>
            {{-- <label class="switch form-control"  style="margin: 20px; border: 0">
                <input type="checkbox" value="{{$topics->status == 0 ? 'checked' : false}}" />
                <span class="slider round"></span>
            </label> --}}
        </div>

        <div class="mb-3">
            <label for="">Trạng thái:</label>
            <select name="status" class="form-control">
                <option value="0" {{$forums->status == 0 ? 'selected' : false}}>Chưa kích hoạt</option>
                <option value="1" {{$forums->status == 1 ? 'selected' : false}}>Kích hoạt</option>
            </select>
            {{-- <label class="switch form-control"  style="margin: 20px; border: 0">
                <input type="checkbox" value="{{$topics->status == 0 ? 'checked' : false}}" />
                <span class="slider round"></span>
            </label> --}}
        </div>

        <button type="submit" class="btn btn-add float-right">Cập nhật</button>
        <a href="{{route('admin.forums')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection