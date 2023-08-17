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
                <h1 class="h3 mb-0 text-gray-800">Sửa chủ đề</h1>
            </div>
        </div>
    
        <div class="card-body">
            <form action="{{route('admin.update-topics', ['id' => $topics->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    <label for="">Chủ đề:</label>
                    <input type="text" name="topics-name" class="form-control" placeholder="Nhập topic..."value="{{$topics->name}}">
                    @error('topics-name')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Icon:</label>
                    <input type="text" name="topics-icon" class="form-control" placeholder="Nhập icon..."value="{{$topics->icon}}">
                    @error('topics-icon')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Mô tả:</label>
                    <textarea type="text" name="topics-description" rows="5" class="form-control mySummernote" placeholder="Nhập topic...">{{$topics->description}}</textarea>
                    @error('topics-description')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Chuyên ngành:</label>
                    <select name="profession_id" class="form-control">
                        <option value="">-- Chọn chuyên ngành --</option>
                        @foreach ($professions as $professionItem)
                            <option value="{{$professionItem->id}}" {{$topics->profession_id == $professionItem->id ? 'selected' : false}}>{{$professionItem->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="mb-3">
                    <label for="">Slug:</label>
                    <input type="text" name="slug" class="form-control" placeholder="Nhập slug..."value="{{$topics->slug}}">
                    @error('slug')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Trạng thái:</label>
                    <select name="status" class="form-control">
                        <option value="0" {{$topics->status == 0 ? 'selected' : false}}>Chưa kích hoạt</option>
                        <option value="1" {{$topics->status == 1 ? 'selected' : false}}>Kích hoạt</option>
                    </select>
                    {{-- <label class="switch form-control"  style="margin: 20px; border: 0">
                        <input type="checkbox" value="{{$topics->status == 0 ? 'checked' : false}}" />
                        <span class="slider round"></span>
                    </label> --}}
                </div>
        
                <button type="submit" class="btn btn-add float-right">Cập nhật</button>
                <a href="{{route('admin.topics')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection