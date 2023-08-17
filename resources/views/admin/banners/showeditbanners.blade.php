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
                <h1 class="h3 mb-0 text-gray-800">Sửa banner</h1>
            </div>
        </div>
    
    
        <div class="card-body">
            <form action="{{route('admin.update-banners', ['id' => $banners->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    <label for="">Tiêu đề:</label>
                    <input type="text" name="banner-title" class="form-control" placeholder="Nhập tiêu đề..."value="{{$banners->title}}">
                    @error('banner-title')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Mô tả:</label>
                    <textarea name="banner-description" id="mySummernote" rows="5" class="form-control" placeholder="Nhập vào...">{{$banners->description}}</textarea>
                    @error('banner-description')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label>Slug:</label>
                    <input class="form-control" type="text" name="banner-slug" value="{{$banners->slug}}">
                    @error('banner-slug')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                {{-- <div class="mb-3">
                    <label>Hình ảnh</label>
                    <input class="form-control" type="file" name="banner-image" value="{{$banners->image}}">
                    @error('banner-image')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div> --}}
        
                <div class="mb-3">
                    <label for="">Banner dùng cho:</label>
                    <select name="type" class="form-control">
                        <option value="1" {{$banners->type == 1 ? 'selected' : false}}>Website</option>
                        <option value="0" {{$banners->type == 2 ? 'selected' : false}}>App</option>
                    </select>
                </div>
        
        
                <div class="mb-3">
                    <label for="">Trạng thái:</label>
                    <select name="status" class="form-control">
                        <option value="0" {{$banners->status == 0 ? 'selected' : false}}>Chưa kích hoạt</option>
                        <option value="1" {{$banners->status == 1 ? 'selected' : false}}>Kích hoạt</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-add float-right">Cập nhật</button>
                <a href="{{route('admin.banners')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection