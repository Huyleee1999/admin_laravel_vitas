@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa thẻ của chương trình</h1>
    </div>


    <form action="{{route('admin.update-tag-program', ['id' => $tagprograms->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Thẻ:</label>
            <select name="tag_id" class="form-control">
                <option value="">-- Chọn thẻ --</option>
                @foreach ($tags as $tagItem)
                    <option value="{{$tagItem->id}}" {{$tagprograms->tag_id == $tagItem->id ? 'selected' : false}}>{{$tagItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Chương trình:</label>
            <select name="program_id" class="form-control">
                <option value="">-- Chọn chương trình --</option>
                @foreach ($programs as $programItem)
                    <option value="{{$programItem->id}}" {{$tagprograms->program_id == $programItem->id ? 'selected' : false}}>{{$programItem->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-add float-right">Cập nhật</button>
        <a href="{{route('admin.tag-program')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection