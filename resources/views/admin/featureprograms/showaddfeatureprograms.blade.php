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
                <h1 class="h3 mb-0 text-gray-800">Thêm chương trình</h1>
            </div>
        </div>
    
        <div class="card-body">
            <form action="{{route('admin.add-featureprograms')}}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-3">
                    <label for="">Chương trình:</label>
                    <input type="text" name="featureprograms-name" class="form-control" placeholder="Nhập tính năng..."value="{{old('featureprograms-name')}}">
                    @error('featureprograms-name')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Mô tả:</label>
                    <textarea type="text"  rows="5" name="featureprograms-description" class="form-control mySummernote" placeholder="Nhập mô tả...">{{old('featureprograms-description')}}</textarea>
                    @error('featureprograms-description')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Nội dung:</label>
                    <textarea type="text" rows="5" name="featureprograms-content" class="form-control mySummernote" placeholder="Nhập nội dung..." >{{old('featureprograms-content')}}</textarea>
                    @error('featureprograms-content')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Chuyên ngành:</label>
                    <select name="profession_id" class="form-control">
                        <option value="">-- Chọn chuyên ngành --</option>
                        @foreach ($professions as $professionItem)
                            <option value="{{$professionItem->id}}">{{$professionItem->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="mb-3">
                    <label for="">Slug:</label>
                    <input type="text" name="featureprograms-slug" class="form-control" placeholder="Nhập slug..."value="{{old('featureprograms-slug')}}">
                    @error('featureprograms-slug')
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
                <a href="{{route('admin.featureprograms')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection