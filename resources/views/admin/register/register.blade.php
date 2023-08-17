<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vitas Register</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">                
  
    <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/sb-admin-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        
    {{-- @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
    @endif --}}
    @if(session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
                            </div>
                            <form class="user" action="{{route('admin.auth-check-register')}}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="name"
                                            placeholder="Nhập họ tên...">
                                        @error('name')
                                            <span style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="phone" class="form-control form-control-user" name="phone"
                                             placeholder="Nhập số điện thoại...">
                                        @error('phone')
                                            <span style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Địa chỉ email...">
                                    @error('email')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror 
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                        name="password" placeholder="Mật khẩu...">
                                    @error('password')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror 
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        name="confirm" placeholder="Nhập lại mật khẩu...">
                                    </div>
                                    @error('confirm')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror 
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Đăng ký
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{route('admin.auth-login')}}">Bạn đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

     <!-- Bootstrap core JavaScript-->
     <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
     <script src="{{asset('assets/js/all.min.js')}}"></script>
     <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
     <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>