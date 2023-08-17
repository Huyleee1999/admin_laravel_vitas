@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa lịch đặt hẹn</h1>
    </div>


    <form action="{{route('admin.update-bookings', ['id' => $bookings->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Tên người đặt hẹn:</label>
            <input type="text" name="bookings-name" class="form-control" placeholder="Nhập người đặt hẹn..."value="{{$bookings->name}}">
            @error('bookings-name')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nội dung:</label>
            <textarea type="text" name="bookings-content" rows="5" class="form-control" placeholder="Nhập mô tả...">{{$bookings->content}}</textarea>
            @error('bookings-content')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Số điện thoại:</label>
            <input type="phone" name="bookings-phone" class="form-control" placeholder="Nhập số điện thoại..."value="{{$bookings->phone}}">
            @error('bookings-phone')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Chuyên gia:</label>
            <select name="expert_id" class="form-control">
                <option value="">-- Chọn chuyên gia --</option>
                @foreach ($experts as $expertItem)
                    <option value="{{$expertItem->id}}" {{$bookings->expert_id == $expertItem->id ? 'selected' : false}}>{{$expertItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Thời gian đặt:</label>
            <input type="text" name="bookings-time" class="form-control" placeholder="Nhập thời gian đặt..."value="{{$bookings->time}}">
            @error('bookings-time')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Ngày đặt:</label>
            <input type="text" name="bookings-date" class="form-control" placeholder="Nhập ngày đặt..."value="{{$bookings->date}}">
            @error('bookings-date')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Liên kết người dùng:</label>
            <input type="url" name="bookings-link" class="form-control" placeholder="Nhập link..."value="{{$bookings->link}}">
            @error('bookings-link')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-add float-right">Cập nhật</button>
        <a href="{{route('admin.bookings')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection