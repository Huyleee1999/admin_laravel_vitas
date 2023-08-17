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
                        <th>Diễn đàn</a></th>
                        <th>Nội dung</a></th>
                        <th>Được tạo bởi</a></th>
                        <th>Chủ đề</a></th>
                        <th>Thời gian tạo</a></th>
                        <th>Hiển thị</a></th>
                        <th>Trạng thái</a></th>
                        <th width="5%">Khôi phục</th>
                        <th width="5%">Xóa vĩnh viễn</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($forums))
                        @foreach ($forums as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->users->name}}</td>
                            <td>{{$item->topics->name}}</td>
                            <td>{{$item->created_at}}</td>                                 
                            <td>{!!$item->is_highlight == 0?'<button class="btn btn-sm btn-danger">Không hiển thị</button>':'<button class="btn btn-sm btn-success">Hiển thị</button>'!!}</td>
                            <td>{!!$item->status == 0?'<button class="btn btn-sm btn-danger">Chưa kích hoạt</button>':'<button class="btn btn-sm btn-success">Đã kích hoạt</button>'!!}</td>
                            <td>
                                <a href="{{route('admin.restore-forums', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Khôi phục</a>                      
                            </td>  
                            <td>
                                <a href="{{route('admin.force-delete-forums', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Xóa vĩnh viễn</a>                     
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
