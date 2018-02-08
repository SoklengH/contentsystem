<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link href="{{ asset('assetAdmin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS FRAMEWORK - END -->
    <!-- CORE CSS TEMPLATE - START -->
    <link href="{{ asset('assetAdmin/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    @yield('styles')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    {{--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="page-container row-fluid">
    <!-- SIDEBAR - START -->
        <div class="page-sidebar">
        <!-- MAIN MENU Sibar - START -->
            <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
            <!-- USER INFO - START -->
                <div class="profile-info row">
                    <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                        <a href="#" style="align-items: center;"><img src="{{ asset(Auth::user()->profile['avatar']) }}" class='img-responsive img-circle'></a>
                    </div>
                </div>
                <div align="center" style="margin: auto; color: white; font-size: 20px; margin-bottom: 40px;">{{ Auth::user()->name }}</div>

                <div class="collapse navbar-collapse profile-info" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left nav navbar-nav list-inline">
                    <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="list-inline-item list-inline-item">
                                <a href="{{ route('user.profile') }}">Profile</a>
                                <a href="{{ route('user.edit') }}">Edit Profile</a>
                                <a href="{{ route('users') }}">All Users</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="width: 100%" style="position: relative;">
        <div class="row" id="main-content">
            <div class="pro-button table-responsive" id="myDIV">
                <a href="{{ route('posts') }}"><button id="product" type="button" class="btn btn-success set-botton">Product</button></a>
                <a href="{{ route('categories') }}"><button id="category" type="button" class="btn btn-success set-botton">Categories</button></a>
                <a href="{{ route('events') }}"><button id="event" type="button" class="btn btn-success set-botton">Event</button></a>
                <a href="{{ route('suppliers') }}"><button id="supplier" type="button" class="btn btn-success set-botton">Suppliers</button></a>
                <a href="{{ route('type') }}"><button id="type" type="button" class="btn btn-success set-botton">Categories Type</button></a>
            </div>

            <hr style="margin-top: 110px;">
            <div>
                @yield('content')
            </div>
    </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script> 
<script src="{{ asset('assetAdmin/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assetAdmin/js/jquery.easing.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assetAdmin/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assetAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assetAdmin/plugins/viewport/viewportchecker.js') }}" type="text/javascript"></script>  
<!-- CORE JS FRAMEWORK - END -->

<!-- CORE TEMPLATE JS - START -->
<script src="{{ asset('assetAdmin/js/scripts.js') }}" type="text/javascript"></script>
{{-- <script src="/js/toastr.min.js"></script> --}}
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif
</script>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });

}

  //adding the style to the active button
  $('#'+'{{$active}}').css({"backgroundColor": "green", "color": "white"});

</script>
@yield('scripts')
</body>
</html>