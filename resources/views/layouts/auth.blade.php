<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}"> 
 
    @yield('css')
    <title>@yield('title')</title>
    @livewireStyles
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
    <!-- Bootstrap -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    @yield('js')
    @livewireScripts
</body>
</html>