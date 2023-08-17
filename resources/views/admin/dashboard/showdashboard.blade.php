@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h3 mb-0 text-gray-800" style="font-size: 2rem">Trang chủ</h2>
            </div>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4 dashboard-item">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                        Người dùng
                                    </div>
                                    <h1>{{ $users }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between ">
                                <a href="{{route('admin.users')}}" class="medium text-black stretched-link">Chi tiết</a>
                                <div class="medium"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
        
                <div class="col-xl-3 col-md-6 mb-4 dashboard-item">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-lg font-weight-bold text-info text-uppercase mb-1">
                                        Tổng số bình luận
                                    </div>
                                    <h1>{{ $comments }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between ">
                                <a href="{{route('admin.comments')}}" class="medium text-black stretched-link">Chi tiết</a>
                                <div class="medium"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
        
                <div class="col-xl-3 col-md-6 mb-4 dashboard-item">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                        Tổng số đặt hẹn
                                    </div>
                                    <h1>{{ $bookings }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between ">
                                <a href="{{route('admin.bookings')}}" class="medium text-black stretched-link">Chi tiết</a>
                                <div class="medium"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
        
                <div class="col-xl-3 col-md-6 mb-4 dashboard-item">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                                        Tổng số đánh giá
                                    </div>
                                    <h1>{{ $evaluates }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between ">
                                <a href="{{route('admin.evaluates')}}" class="medium text-black stretched-link">Chi tiết</a>
                                <div class="medium"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    </div>
</div>
@endsection