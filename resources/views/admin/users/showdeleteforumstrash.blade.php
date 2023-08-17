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
                        <th>Tên người dùng</a></th>
                        <th>Số điện thoại</a></th>
                        <th>Email</a></th>
                        <th>Tỉnh thành</a></th>
                        <th width="5%">Khôi phục</th>
                        <th width="5%">Xóa vĩnh viễn</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($users))
                        @foreach ($users as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->city->name}}</td>  
                            <td>
                                <a href="{{route('admin.restore-users', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Khôi phục</a>                      
                            </td>  
                            <td>
                                <a href="{{route('admin.force-delete-users', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Xóa vĩnh viễn</a>                     
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
