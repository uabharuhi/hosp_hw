<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Demo </title>

    <!-- Styles -->


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
       <nav>
        <div class="nav-wrapper">
         @if (!Auth::guard('doctor')->check())
          <a href="{{ url('/doctor/login') }}" class="brand-logo">預約系統</a>
         @else
         <a href="{{ url('/doctor/home') }}" class="brand-logo">預約系統</a>
         @endif
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            @if (!Auth::guard('doctor')->check())
               
            @else
                <li>  <a href="{{ route('doctor.home') }}" id="account_ssn"><i class="small material-icons left">account_circle</i>{{Auth::guard('doctor')->user()->ssn}}</a></li>
                <li><a href="{{ route('doctor.reservations') }}">查看預約</a></li>
                <li >
                    <a href="/doctor/logout">
                       登出
                    </a>
                </li>
            @endif
          </ul>
        </div>
      </nav>
        <div id="content_wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
        </div>
    </div>
    <div id="footer"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
     @stack('scripts')
</body>
</html>
