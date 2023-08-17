@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa chuyên gia của chương trình</h1>
    </div>


    <form action="{{route('admin.update-expert-program', ['id' => $expro->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Chuyên gia:</label>
            <select name="expert_id" class="form-control">
                <option value="">-- Chọn chuyên gia --</option>
                @foreach ($experts as $expertItem)
                    <option value="{{$expertItem->id}}" {{$expro->expert_id == $expertItem->id ? 'selected' : false}}>{{$expertItem->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="">Chương trình:</label>
            <select name="program_id" class="form-control">
                <option value="">-- Chọn chương trình --</option>
                @foreach ($features as $featureItem)
                    <option value="{{$featureItem->id}}" {{$expro->program_id == $featureItem->id ? 'selected' : false}}>{{$featureItem->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-add float-right">Cập nhật</button>
        <a href="{{route('admin.expert-program')}}" class="btn btn-back float-right" style="margin-right: 6px">Quay lại</a>
    </form>
</div>
@endsection