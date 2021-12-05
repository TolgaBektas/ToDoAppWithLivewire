<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/css/sweetalert2.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}"> 
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{asset('assets/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/codemirror/theme/monokai.css')}}">
    @yield('css')
    <title>@yield('title')</title>

</head>
<body>
    <ul class="nav justify-content-end">
        @auth
        <form action="{{ route('logout') }}" id="logout" method="POST">
            <li class="nav-item d-none d-sm-inline-block">
                @csrf
              <a type="submit" class="nav-link" onclick="document.getElementById('logout').submit();">Logout</a>
            </li>
        </form>
        @endauth
        @guest
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ Route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ Route('register') }}">Register</a>
        </li>
        @endguest
              
    </ul>

    @yield('content')

    <!-- REQUIRED SCRIPTS -->
    <!-- Jquery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>    
    <!-- Bootstrap -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    
    <!-- SweetAlert2 -->
    <script src="{{asset('assets/plugins/sweetalert2/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/js/sweetalert2.all.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script> 
    <!-- CodeMirror -->
    <script src="{{asset('assets/plugins/codemirror/codemirror.js')}}"></script>
    <script src="{{asset('assets/plugins/codemirror/mode/css/css.js')}}"></script>
    <script src="{{asset('assets/plugins/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{asset('assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Page specific script -->
    <script>
        $(document).ready(function(){
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
            });
            $(function () {
                bsCustomFileInput.init();
            });
        });
    </script>

    @yield('js')
</body>
</html>