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
    <style>
        ::-webkit-scrollbar {
            width: 1px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

</head>
<body>
<div class="page-container row-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ Auth::user()->name }}</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">
                                <img alt="User Pic" src="{{ asset(Auth::user()->profile['avatar']) }}" class="img-circle img-responsive">
                            </div>

                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>ID:</td>
                                        <td>{{ Auth::user()->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Role:</td>
                                        <td>{{ Auth::user()->admin == 1 ? "Admin Nah men kror reh" : "User" }}</td>
                                    </tr>
                                    <tr>
                                        <td>Background:</td>
                                        <td>{{ Auth::user()->profile['about'] }}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Facebook:</td>
                                        <td><a href="{{ url(Auth::user()->profile['facebook']) }}">Fabecook Profile</a></td>

                                    </tr>
                                    <tr>
                                        <td>Youtube:</td>
                                        <td><a href="{{ url(Auth::user()->profile['youtube']) }}">YouTube Profile</a></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>


                                    </tbody>
                                </table>

                                <a href="#" class="btn btn-primary">My Sales Performance</a>
                                <a href="#" class="btn btn-primary">Team Sales Performance</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        {{--<a data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-log-out"></i></a>--}}
                        <a data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <span class="pull-right">
                            <a href="{{ route('user.edit') }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Back" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" href="{{ route('posts') }}"><i class="glyphicon glyphicon-home"></i></button></a>
                        </span>
                    </div>
                </div>
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
<script src="{{ asset('assetAdmin/js/profile.js') }}"></script>
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
