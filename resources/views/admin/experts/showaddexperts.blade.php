@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm chuyên gia</h1>
    </div>


    <form action="{{route('admin.add-experts')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="">Tên chuyên gia:</label>
            <input type="text" name="experts-name" class="form-control" placeholder="Nhập tên chuyên gia..."value="{{old('experts-name')}}">
            @error('experts-name')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Số điện thoại:</label>
            <input type="tel" name="experts-phone" class="form-control" placeholder="Nhập số điện thoại..."value="{{old('experts-phone')}}">
            @error('experts-phone')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email:</label>
            <input type="email" name="experts-email" class="form-control" placeholder="Nhập email..." value="{{old('experts-email')}} ">
            @error('experts-email')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Công ty:</label>
            <input type="text" name="experts-company" class="form-control" placeholder="Nhập công ty..."value="{{old('experts-company')}}">
            @error('experts-company')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Mô tả:</label>
            <textarea type="text" rows="5" name="experts-description" class="form-control mySummernote" placeholder="Nhập mô tả...">{{old('experts-description')}}</textarea>
            @error('experts-description')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Giá:</label>
            <input type="text" name="experts-price" class="form-control" placeholder="Nhập giá..."value="{{old('experts-price')}}">
            @error('experts-price')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nội dung:</label>
            <textarea type="text" rows="5" name="experts-content" class="form-control mySummernote" placeholder="Nhập nội dung..." >{{old('experts-content')}}</textarea>
            @error('experts-content')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Kinh nghiệm:</label>
            <textarea type="text" rows="3" name="experts-experience" class="form-control" placeholder="Nhập kinh nghiệm..." >{{old('experts-experience')}}</textarea>
            @error('experts-experience')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Vị trí:</label>
            <input type="text" name="experts-position" class="form-control" placeholder="Nhập vị trí..."value="{{old('experts-position')}}">
            @error('experts-position')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Thành tựu:</label>
            <textarea type="text" rows="2" name="experts-certificate" class="form-control" placeholder="Nhập thành tựu..." >{{old('experts-certificate')}}</textarea>
            @error('experts-certificate')
                <span style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Dự án:</label>
            <textarea type="text" rows="2" name="experts-project" class="form-control" placeholder="Nhập dự án..." >{{old('experts-project')}}</textarea>
            @error('experts-project')
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
            <label for="">Hiển thị:</label>
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
        <a href="{{route('admin.experts')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection