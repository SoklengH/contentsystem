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
                            <a href="#">
                                <img src="images/user/xs/default.png" class='img-responsive img-circle'>
                            </a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-left">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
           
            </div>
        
         </div>

    <div class="container" style="width: 100%" style="position: relative;">
            <div class="row" id="main-content">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit your profile
					</div>
					<div class="panel-body">
						<form action="{{ route('user.profile.update') }}" method="post"	enctype="multipart/form-data">
							{!! csrf_field() !!}

							<div class="form-group">
								<label for="name">Username</label>
							    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Email</label>
							    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">New Password</label>
							    <input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Upload New avatar</label>
							    <input type="file" name="avatar" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Facebook profile</label>
							    <input type="text" name="facebook" value="{{ $user->profile['facebook'] }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Youtube profile</label>
							    <input type="text" name="youtube" value="{{ $user->profile['youtube'] }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="about">About You</label>
								<textarea name="about" id="about" col="2" rows="2" class="form-control">{{ $user->profile['about'] }}</textarea>
							</div>
							<div class="form-group">
								<div class="text-center">
									<button class="btn btn-success" type="submit">
									Update User
								</button>
								</div>
							</div>

						</form>
					</div>
				</div>
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
    @yield('scripts')
</body>
</html>


	