@extends('layouts.master')

@section('title', 'Banners admin')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h2>Diễn đàn <a href="{{route('admin.show-add-forums')}}" class="btn btn-add btn-md float-right"><i class="fa-solid fa-plus" style="margin-right: 6px"></i>Thêm</a></h2>
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
                        {{-- <th>Hiển thị</a></th> --}}
                        <th>Trạng thái</a></th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
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
                            {{-- <td>{!!$item->is_highlight == 0?'<button class="btn btn-sm btn-danger">Không hiển thị</button>':'<button class="btn btn-sm btn-success">Hiển thị</button>'!!}</td> --}}
                            <td class="text-center">{!!$item->status == 0?'<button class="btn btn-sm btn-danger-status">Tắt</button>':'<button class="btn btn-sm btn-success">Bật</button>'!!}</td>
                            <td class="text-center">
                                <a href="{{route('admin.show-edit-forums', ['id' => $item->id])}}" class="btn btn-back btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                            </td>
                            <td class="text-center">
                                {{-- <a href="{{route('admin.delete', ['id'=> $item->id])}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" ><i class="fa-regular fa-trash-can"></i></a>                        --}}
                                <button type="button" class="btn btn-delete btn-sm deleteForumBtn" value="{{ $item->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fa-regular fa-trash-can"></i></button>
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <form action="{{route('admin.delete-forums')}}" method="POST">
                                            @csrf
                                
                                            <div class="modal-header">
                                                <div class="header-modal"><h4 class="modal-title" id="exampleModalLabel">Thông báo !</h4></div>
                                                <button type="button" style="color: white !important" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="forum_delete_id" id="forum_id">
                                                <p style="text-wrap: balance; padding: 0">Bạn chắc chắc muốn xóa vĩnh viễn <b>{{$item->name}}</b> này chứ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary cancelbtn" data-dismiss="modal"><i class="fa-solid fa-arrow-rotate-left"></i></button>
                                                <button type="submit" class="btn btn-danger deletebtn"><i class="fa-solid fa-trash-can"></i></button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                            </td>             
                        </tr>
                        @endforeach
                        {{-- <a href="{{route('admin.show-delete-banners-trash')}}" class="btn btn-danger btn-sm">Thùng rác</a>                        --}}                    
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

@section('scripts')
   <script>
        $(document).ready(function () {
            $('.deleteForumBtn').click(function (e) {
                e.preventDefault();

                var forum_id = $(this).val();
                $('#forum_id').val(forum_id);
                $('#deleteModal').modal('show');
            });
        });
   </script>
@endsection