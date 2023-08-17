@extends('layouts.master')

@section('title', 'Liên hệ')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h2>Liên hệ</h2>
        </div>
        <div class="card-body">
            <table id="dtHorizontalExample" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th>Tên</a></th>
                        <th>Số điện thoại</a></th>
                        <th>Nội dung</a></th>
                        <th>Email</a></th>
                        <th>Chuyên ngành</a></th>
                        <th>Thời gian tạo</a></th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($contacts))
                        @foreach ($contacts as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->professions->name}}</td>
                            <td>{{$item->created_at}}</td>                                 
                            <td class="text-center">
                                {{-- <a href="{{route('admin.delete', ['id'=> $item->id])}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" ><i class="fa-regular fa-trash-can"></i></a>                        --}}
                                <button type="button" class="btn btn-delete btn-sm deleteContactBtn" value="{{ $item->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fa-regular fa-trash-can"></i></button>
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <form action="{{route('admin.delete-contacts')}}" method="POST">
                                            @csrf
                                
                                            <div class="modal-header">
                                                <div class="header-modal"><h4 class="modal-title" id="exampleModalLabel">Thông báo !</h4></div>
                                                <button type="button" style="color: white !important" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="contact_delete_id" id="contact_id">
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
            $('.deleteContactBtn').click(function (e) {
                e.preventDefault();

                var contact_id = $(this).val();
                $('#contact_id').val(contact_id);
                $('#deleteModal').modal('show');
            });
        });
   </script>
@endsection
