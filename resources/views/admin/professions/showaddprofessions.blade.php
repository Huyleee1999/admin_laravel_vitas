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
                <h1 class="h3 mb-0 text-gray-800">Thêm chuyên ngành</h1>
            </div>   
        </div>
        <div class="card-body">
            <form action="{{route('admin.add-professions')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Tên chuyên ngành</label>
                    <input type="text" name="professions-name" class="form-control" placeholder="Nhập chuyên ngành..."value="{{old('professions-name')}}">
                    @error('professions-name')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="0" {{old('status')==0?'selected':false}}>Chưa kích hoạt</option>
                        <option value="1" {{old('status')==1?'selected':false}}>Kích hoạt</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-add float-right">Thêm mới</button>
                <a href="{{route('admin.professions')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection