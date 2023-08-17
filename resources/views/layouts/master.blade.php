<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="{{asset('assets/fonts/fa-brands-400.svg')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/fa-regular-400.svg')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/fa-solid-900.svg')}}" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">                
  
    <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/sb-admin-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Pagination CSS link-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    
    <!-- Summernote CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px !important;
            margin: 0px !important;
        }
        .div.dataTables_wrapper div.dataTables_length select {
            width: 50% !important;
        }
    </style>
   
</head>
<body id="page-top">
    <div id="wrapper" style="background-color: #dee2e6">
        @include('layouts.inc.admin-sidebar') 
        <div id="content-wrapper" class="d-flex flex-column">
                @include('layouts.inc.admin-navbar')
                @yield('content')
                @include ('layouts.inc.admin-footer')    
        </div>   
    </div>

    {{-- <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Pagination JS link-->
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>


    {{-- <script>
        $(document).ready( function () {
            $('#myDataTable').DataTable();
        } );
    </script> --}}

    {{-- <script>
        function openNav() {
          document.getElementsByClassName("mySidebar").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }
        
        function closeNav() {
          document.getElementsByClassName("mySidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
        }
    </script> --}}

    {{-- <script>
        $document.ready(function() {
            $('.openbtn').click(function (e) {
                e.preventDefault();

                $('.mySidebar').width('0');
            })    

            $('.closebtn').click(function (e) {
                e.preventDefault();

                $('.mySidebar').width('250px');
            })    
        })
    </script> --}}
    <script>
        $(document).ready(function () {
            $('#dtHorizontalExample').DataTable({
                "scrollX": true,
                info: false,
                paging: false,
                scrollCollapse: true,
                scrollY: '400px',
            });
            
        });
    </script>

    <!-- Summernote JS link-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".mySummernote").summernote({
                height: 250,
            });

            $('.dropdown-toggle').dropdown();
        });
    </script>
    @yield('scripts')

</body>
</html>