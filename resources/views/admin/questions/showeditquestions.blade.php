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
                <h1 class="h3 mb-0 text-gray-800">Sửa câu hỏi</h1>
            </div>
        </div>
    
        <div class="card-body">
            <form action="{{route('admin.update-questions', ['id' => $questions->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    <label for="">Chuyên ngành:</label>
                    <select name="profession_id" class="form-control">
                        <option value="">-- Chọn chuyên ngành --</option>
                        @foreach ($professions as $professionItem)
                            <option value="{{$professionItem->id}}" {{$questions->profession_id == $professionItem->id ? 'selected' : false}}>{{$professionItem->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="mb-3">
                    <label for="">Nội dung:</label>
                    <input type="text" name="questions-content" class="form-control mySummernote" placeholder="Nhập nội dung..."value="{{$questions->content}}">
                    @error('questions-content')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Trả lời:</label>
                    <input type="text" name="questions-answer" class="form-control mySummernote" placeholder="Nhập câu trả lời..."value="{{$questions->answer}}">
                    @error('questions-answer')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Trạng thái:</label>
                    <select name="status" class="form-control">
                        <option value="0" {{$questions->status == 0 ? 'selected' : false}}>Chưa kích hoạt</option>
                        <option value="1" {{$questions->status == 1 ? 'selected' : false}}>Kích hoạt</option>
                    </select>
                    {{-- <label class="switch form-control"  style="margin: 20px; border: 0">
                        <input type="checkbox" value="{{$topics->status == 0 ? 'checked' : false}}" />
                        <span class="slider round"></span>
                    </label> --}}
                </div>
        
                <button type="submit" class="btn btn-add float-right">Cập nhật</button>
                <a href="{{route('admin.questions')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection