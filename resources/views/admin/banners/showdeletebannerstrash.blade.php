@extends('layouts.master')

@section('title', 'Banners admin')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h4>Các dữ liệu đã xóa</h4>
        </div>
        <div class="card-body">
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif

            <table id="dtHorizontalExample" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th>Tiêu đề</a></th>
                        <th>Mô tả</a></th>
                        {{-- <th>Hình ảnh</a></th> --}}
                        <th>Thời gian tạo</a></th>
                        <th>Trạng thái</a></th>
                        <th width="5%">Khôi phục</th>
                        <th width="5%">Xóa vĩnh viễn</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($banners))
                        @foreach ($banners as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            {{-- <td>
                                <img src="{{asset('uploads/banners/'.$item->image)}}" width="50px" height="50px" alt="">
                            </td> --}}
                            <td>{{$item->created_at}}</td>      
                            <td>{!!$item->status == 0?'<button class="btn btn-sm btn-danger">Chưa kích hoạt</button>':'<button class="btn btn-sm btn-success">Đã kích hoạt</button>'!!}</td>        
                            <td>
                                <a href="{{route('admin.restore-banners', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Khôi phục</a>                      
                            </td>
                            <td>
                                <a href="{{route('admin.force-delete-banners', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Xóa vĩnh viễn</a>                                          
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6">Không có người dùng</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection