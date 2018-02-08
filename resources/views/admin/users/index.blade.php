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
    <div class="pro-button table-responsive" id="myDIV" style="position: relative; margin-bottom: 10px; margin-top: px;">
        <a href="{{ route('posts') }}"><button id="product" type="button" class="btn btn-success set-botton">Product</button></a>
        <a href="{{ route('categories') }}"><button id="category" type="button" class="btn btn-success set-botton">Categories</button></a>
        <a href="{{ route('events') }}"><button id="event" type="button" class="btn btn-success set-botton">Event</button></a>
        <a href="{{ route('suppliers') }}"><button id="supplier" type="button" class="btn btn-success set-botton">Suppliers</button></a>
        <a href="{{ route('type') }}"><button id="type" type="button" class="btn btn-success set-botton">Categories Type</button></a>
    </div>
    <div class="container" style="width: 100%" style="position: relative;">
        <div class="row" id="main-content" style="margin-right: 100px; margin-left: 100px">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <th>
                            Images
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Permission
                        </th>
                        <th>
                            Delete
                        </th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>

                                <td>
                                    <img src="{{ asset($user->profile['avatar']) }}" width="60px" height="60px" style="border-radius: 50%;">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @if($user->admin)
                                        <a class="btn btn-xs btn-danger disabled" href="{{ route('user.not.admin', ['id'=>$user->id]) }}">Admin</a>
                                    @else
                                        <a class="btn btn-xs btn-success" href="{{ route('user.admin', ['id'=>$user->id]) }}">Make Admin</a>
                                    @endif
                                </td>
                                <td>
                                    @if($user->admin)
                                        <a class="btn btn-xs btn-danger disabled" href="{{ route('user.delete', ['id'=>$user->id]) }}">Delete</a>
                                    @else
                                        <a class="btn btn-xs btn-danger " href="{{ route('user.delete', ['id'=>$user->id]) }}">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
<script language="javascript">
    function autoResizeDiv()
    {
        document.getElementById('full-screen-me').style.height = window.innerHeight +'px';
    }
    window.onresize = autoResizeDiv;
    autoResizeDiv();
</script>
@yield('scripts')
</body>
</html>









    