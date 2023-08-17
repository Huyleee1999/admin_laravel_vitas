@extends('layouts.master')

@section('title', 'Banners admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Xem danh sách đặt hẹn</h4>
        </div>
        <div class="card-body">
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif

            <table id="dtHorizontalExample" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th>Tên người đặt</a></th>
                        <th>Nội dung</a></th>
                        <th>Số điện thoại</a></th>
                        <th>Chuyên gia</a></th>
                        <th>Thời gian đặt</a></th>
                        <th>Ngày đặt</a></th>
                        <th>Liên kết người dùng</a></th>
                        <th>Thời gian tạo</a></th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($bookings))
                        @foreach ($bookings as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->experts->name}}</td>
                            <td>{{$item->time}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->link}}</td>
                            <td>{{$item->created_at}}</td>                                 
                            <td class="text-center">
                                <a href="{{route('admin.show-edit-bookings', ['id' => $item->id])}}" class="btn btn-back btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                            </td>
                            <td class="text-center">
                                {{-- <a href="{{route('admin.delete', ['id'=> $item->id])}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" ><i class="fa-regular fa-trash-can"></i></a>                        --}}
                                <button type="button" class="btn btn-delete btn-sm deleteBookingBtn" value="{{ $item->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fa-regular fa-trash-can"></i></button>
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <form action="{{route('admin.delete-bookings')}}" method="POST">
                                            @csrf
                                
                                            <div class="modal-header">
                                                <div class="header-modal"><h4 class="modal-title" id="exampleModalLabel">Thông báo !</h4></div>
                                                <button type="button" style="color: white !important" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="booking_delete_id" id="booking_id">
                                                <p style="text-wrap: balance; padding: 0">Bạn chắc chắc muốn xóa vĩnh viễn <b>{{$item->title}}</b> này chứ?</p>
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
            $('.deleteBookingBtn').click(function (e) {
                e.preventDefault();

                var booking_id = $(this).val();
                $('#booking_id').val(booking_id);
                $('#deleteModal').modal('show');
            });
        });
   </script>
@endsection