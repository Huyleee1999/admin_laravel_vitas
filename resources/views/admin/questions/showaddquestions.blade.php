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
                <h1 class="h3 mb-0 text-gray-800">Thêm câu hỏi</h1>
            </div>
        </div>
    
        <div class="card-body">
            <form action="{{route('admin.add-questions')}}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <label for="">Nội dung:</label>
                    <textarea type="text" name="questions-content" class="form-control mySummernote" placeholder="Nhập nội dung...">{{old('questions-content')}}</textarea>
                    @error('questions-content')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Trả lời:</label>
                    <textarea type="text" name="questions-answer" class="form-control mySummernote" placeholder="Nhập câu trả lời...">{{old('questions-answer')}}</textarea>
                    @error('questions-answer')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Trạng thái:</label>
                    <select name="status" class="form-control">
                        <option value="0" {{old('status')==0?'selected':false}}>Chưa kích hoạt</option>
                        <option value="1" {{old('status')==1?'selected':false}}>Kích hoạt</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-add float-right">Thêm mới</button>
                <a href="{{route('admin.questions')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection