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
                        <th>Tên chuyên gia</a></th>
                        <th>Số điện thoại</a></th>
                        <th>Email</a></th>
                        <th>Công ty</a></th>
                        <th>Mô tả</a></th>
                        <th>Giá</a></th>
                        <th>Nội dung</a></th>
                        <th>Kinh nghiệm</a></th>
                        <th>Vị trí</a></th>
                        <th>Thành tựu</a></th>
                        <th>Dự án</a></th>
                        <th>Hiển thị</a></th>
                        <th>Trạng thái</a></th>
                        <th width="5%">Khôi phục</th>
                        <th width="5%">Xóa vĩnh viễn</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($experts))
                        @foreach ($experts as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td> 
                            <td>{{$item->company}}</td> 
                            <td>{{$item->description}}</td> 
                            <td>{{$item->price}}</td> 
                            <td>{{$item->content}}</td> 
                            <td>{{$item->experience}}</td> 
                            <td>{{$item->position}}</td> 
                            <td>{{$item->certificate}}</td> 
                            <td>{{$item->project}}</td> 
                            <td>{!!$item->is_highlight == 0?'<button class="btn btn-sm btn-danger">Không hiển thị</button>':'<button class="btn btn-sm btn-success">Hiển thị</button>'!!}</td>
                            <td>{!!$item->status == 0?'<button class="btn btn-sm btn-danger">Chưa kích hoạt</button>':'<button class="btn btn-sm btn-success">Đã kích hoạt</button>'!!}</td>
                            <td>
                                <a href="{{route('admin.restore-experts', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Khôi phục</a>                      
                            </td>
                            <td>
                                <a href="{{route('admin.force-delete-experts', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Xóa vĩnh viễn</a>                                          
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
