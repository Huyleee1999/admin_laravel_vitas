@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thêm banner</h1>
            </div>
        </div>
    
        <div class="card-body">
            <form action="{{route('admin.add')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Tiêu đề:</label>
                    <input type="text" name="banner-title" class="form-control" placeholder="Nhập tiêu đề..."value="{{old('banner-title')}}">
                    @error('banner-title')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Mô tả:</label>
                    <textarea name="banner-description" rows="5" class="form-control mySummernote" placeholder="Nhập vào nội dung...">{{old('banner-description')}}</textarea>
                    @error('banner-description')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label>Slug:</label>
                    <input class="form-control" type="text" name="banner-slug" value="{{old('banner-slug')}}">
                    @error('banner-slug')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                {{-- <div class="mb-3">
                    <label>Hình ảnh</label>
                    <input class="form-control" type="file" name="banner-image" value="{{old('banner-image')}}">
                    @error('banner-image')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div> --}}
        
                <div class="mb-3">
                    <label for="">Banner dùng cho:</label>
                    <select name="type" class="form-control">
                        <option value="1" {{old('type')==1?'selected':false}}>Website</option>
                        <option value="0" {{old('type')==2?'selected':false}}>App</option>
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
                <a href="{{route('admin.banners')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection