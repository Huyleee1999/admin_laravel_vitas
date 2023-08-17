@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa đánh giá</h1>
    </div>


    <form action="{{route('admin.update-evaluates', ['id' => $evaluates->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Đánh giá:</label>
            <input type="text" name="evaluates-rate" class="form-control" placeholder="Nhập đánh giá..."value="{{$evaluates->rate}}">
            @error('evaluates-rate')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nội dung:</label>
            <textarea type="text" name="evaluates-content" rows="5" class="mySummernote form-control" placeholder="Nhập nội dung đánh giá...">{{$evaluates->content}}</textarea>
            @error('evaluates-content')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Người đánh giá:</label>
            <select name="user_id" class="form-control">
                <option value="">-- Chọn người đánh giá --</option>
                @foreach ($users as $userItem)
                    <option value="{{$userItem->id}}" {{$evaluates->user_id == $userItem->id ? 'selected' : false}}>{{$userItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Chuyên gia:</label>
            <select name="expert_id" class="form-control">
                <option value="">-- Chọn chuyên gia --</option>
                @foreach ($experts as $expertItem)
                    <option value="{{$expertItem->id}}" {{$evaluates->expert_id == $expertItem->id ? 'selected' : false}}>{{$expertItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Trạng thái:</label>
            <select name="status" class="form-control">
                <option value="0" {{$evaluates->status == 0 ? 'selected' : false}}>Chưa kích hoạt</option>
                <option value="1" {{$evaluates->status == 1 ? 'selected' : false}}>Kích hoạt</option>
            </select>
            {{-- <label class="switch form-control"  style="margin: 20px; border: 0">
                <input type="checkbox" value="{{$topics->status == 0 ? 'checked' : false}}" />
                <span class="slider round"></span>
            </label> --}}
        </div>

        <button type="submit" class="btn btn-add float-right">Cập nhật</button>
        <a href="{{route('admin.evaluates')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection