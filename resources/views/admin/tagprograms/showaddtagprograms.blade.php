@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm thẻ và chương trình</h1>
    </div>


    <form action="{{route('admin.add-tag-program')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Thẻ:</label>
            <select name="tag_id" class="form-control">
                <option value="">-- Chọn thẻ --</option>
                @foreach ($tags as $tagItem)
                    <option value="{{$tagItem->id}}">{{$tagItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Chương trình:</label>
            <select name="program_id" class="form-control">
                <option value="">-- Chọn chương trình --</option>
                @foreach ($programs as $programItem)
                    <option value="{{$programItem->id}}">{{$programItem->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-add float-right">Thêm mới</button>
        <a href="{{route('admin.tag-program')}}" class="btn btn-back float-right" style="margin-right: 6px;">Quay lại</a>
    </form>
</div>
@endsection